<?php

class AppController extends Controller
{
  public $layout='//layouts/main';
  private $_identity;

  public function filters()
  {
    return array(
      'accessControl', // perform access control for CRUD operations
      'postOnly + delete', // we only allow deletion via POST request s
    );
  }

    public function accessRules()
  {
    return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('view','Logout','login','Dest'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','create','profile','UpdatePieza','CrearAvatar','UpdateTipoPieza','MisMemes','MisAmigos','Categoria','Dest','Catmasvist','Catmascomp','Catjoscuer','Catmascome','Detalle'),
        'users'=>array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','index'),
        'users'=>array('admin'),
      ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
    );
  }

public function actionLogin(){

  //header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
   header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');


       $facebook = new facebook(array(
        'appId'  => '342733185828640',
        'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
        ));
       

        //YII::app()->params['facebook']=$facebook;
        $user =$facebook->getUser();
        $my_access_token= $facebook->getAccessToken();

        if ($user) {
           try {
              // Proceed knowing you have a logged in user who's authenticated.
              $user_profile =  $facebook->api('/me');
            } catch (FacebookApiException $e) {
               error_log($e);
               $user = null;
             }
         }

        if ($user) {
            $logoutUrl = $facebook->getLogoutUrl();
        } else {
            $loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_actions,publish_stream,email,user_birthday,read_stream','redirect_uri'=>'http://www.facebook.com/Lnx1337?sk=app_342733185828640'));
        }

       if($user){
         $model = new Usuarios;
         $response= $model->findAll(array('condition'=>'correo=:correo','params'=>array(':correo'=>$user_profile['email'])));

        if(count($response)==0){

          $model->correo=$user_profile['email'];
          $model->nombre=$user_profile['name'];
          $model->id_facebook=$user_profile['id'];
          $model->sexo=$user_profile['gender'];


             if($model->save(false)){
              Yii::app()->session['usuario_id']=$model->id;
              $this->redirect(array('App/Profile/'.$user_profile['id'])); 
             }
         }else{  
            $model=new Login;
            $model->username=$response[0]->id;
            $model->login();
            Yii::app()->session['usuario_id']=$response[0]->id; 
            $this->redirect(array('App/Profile/'.$user_profile['id'])); 
         }
         }else{
            $this->renderPartial('//app/login',array('loginUrl'=>$loginUrl));

          //$this->render('login',array('loginUrl'=>$loginUrl));
       }
}


public function actionLogout(){
  Yii::app()->user->logout();
}



  public function actionProfile($id)
  {

  header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
 
   $facebook = new facebook(array(
        'appId'  => '342733185828640',
        'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
        ));
   $my_access_token= $facebook->getAccessToken();


   $modelcom = Usuarios::model()->with('Comics')->findAll();
   $modelc= new UsuariosHasTblComics;
   $comic=$modelc->with('Comic.Coments')->findAll(array('condition'=>' t.tbl_usuarios_id=:id ','params'=>array(':id'=>1)));
   $logoutUrl=null;


   $response= Usuarios::model()->with('Avatar.AvatarP.AvatarImg','Comics.Comic.Coments')->findAll(array('condition'=>'id_facebook=:fbid','params'=>array(':fbid'=>$id)));   
   
   $model_PiezaAvatar=new CatalogoPiezas;
   $model_Accesorios=new Accesorios;
   $model_Amigos_Avatars=new Amigos;

   
   $catalogo_caras=$model_PiezaAvatar->getCatalogoCaras();
   $catalogo_cuerpos=$model_PiezaAvatar->getCatalogoCuerpos();
   $catalogo_accesorios=$model_Accesorios->getCatalogoAccesorios();
   $amigosAvatars=$model_Amigos_Avatars->getAmigosAvatars();
   $amigosComics=$model_Amigos_Avatars->getAmigosComics();

   
   $numero_comics=count($response[0]->Comics);
   $comics=array();
   for($count=0;$count<$numero_comics;$count++){
   
      $comics[$count]=array(
       'id'=> $response[0]->Comics[$count]->Comic->id,
       'imagen'=>$response[0]->Comics[$count]->Comic->imagen,
       'NoComentarios'=>$response[0]->Comics[$count]->NoComentarios,
       'NoVisto'=>$response[0]->Comics[$count]->NoVisto,
       'destacado'=>$response[0]->Comics[$count]->destacado);
  

        $countComentarios=count($response[0]->Comics[$count]->Comic->Coments);
           for($com=0;$com<$countComentarios;$com++){
               $comics[$count]['comentarios'][$com]=array(
                  'id'=>$response[0]->Comics[$count]->Comic->Coments[$com]->id,
                  'mensaje'=>$response[0]->Comics[$count]->Comic->Coments[$com]->comment,
                  'date'=>$response[0]->Comics[$count]->Comic->Coments[$com]->date,
                  'nombreUsuario'=>$response[0]->Comics[$count]->Comic->Coments[$com]->Usuarios->nombre,
                  'idFb'=>$response[0]->Comics[$count]->Comic->Coments[$com]->Usuarios->id_facebook
              );
       }

   }

    $cantidad=count($response[0]->Avatar->AvatarP);
    if(count($cantidad)==0){
      $json['edit']="0"; } 
    else{ $json['edit']="1"; }

    $datosAvatar=array();
    for($count=0;$count<$cantidad;$count++){
      $datosAvatar[$count]=array(
        'piezaid'=>$response[0]->Avatar->AvatarP[$count]->pieza_avatar_id,
        'tipo_pieza_id'=>$response[0]->Avatar->AvatarP[$count]->AvatarImg->AvatarTipo->id,
        'descripcion'=>$response[0]->Avatar->AvatarP[$count]->AvatarImg->AvatarTipo->descripcion,
        'AvatarImg'=>$response[0]->Avatar->AvatarP[$count]->AvatarImg->url,
        'scalex'=>$response[0]->Avatar->AvatarP[$count]->scalex,
        'scaley'=>$response[0]->Avatar->AvatarP[$count]->scaley,
        'posx'=>$response[0]->Avatar->AvatarP[$count]->posx,
        'posy'=>$response[0]->Avatar->AvatarP[$count]->posy,
        'zindex'=>$response[0]->Avatar->AvatarP[$count]->zindex,
        'rotation'=>$response[0]->Avatar->AvatarP[$count]->rotation
        );
    }
    $AvatarAccesorios=array();
    $cantidad=count($response[0]->Avatar->AvatarA);
    for ($count=0; $count < $cantidad; $count++) { 
      $AvatarAccesorios[$count]=array(
        'accesorios_id'=>$response[0]->Avatar->AvatarA[$count]->accesorios_id,
        'posx'=>$response[0]->Avatar->AvatarA[$count]->posx,
        'posy'=>$response[0]->Avatar->AvatarA[$count]->posy,
        //'zindex'=>$response[0]->Avatar->AvatarA[$count]->zindex,
        'rotation'=>$response[0]->Avatar->AvatarA[$count]->rotation,
        'accesorioImg'=>$response[0]->Avatar->AvatarA[$count]->Accesorios->url
      );
    }

    $AvatarCaraWeb=array();
    $cantidad=count($response[0]->Avatar->CaraWeb);
    if($cantidad==1){
      $AvatarCaraWeb=array(
        'url'=>$response[0]->Avatar->CaraWeb->url,
      );
    }

    $json['catalogos']=array('caras'=>$catalogo_caras,'cuerpos'=>$catalogo_cuerpos,'accesorios'=>$catalogo_accesorios);
    $json['usuario']=array('nombre'=>$response[0]->nombre,'idFb'=>$response[0]->id_facebook,'sexo'=>$response[0]->sexo);
    $json['avatar']=array('avataid'=>$response[0]->Avatar->id,'avatarImg'=>$response[0]->Avatar->avatar_img,'datecreated'=>$response[0]->Avatar->date_created,
    'avatarPiezas'=>$datosAvatar,'amigosAvatars'=>$amigosAvatars,'comicsAmigos'=>$amigosComics); 
    $json['avatar']['comics']=$comics;
    $json['avatar']['cara_web']=$AvatarCaraWeb;
    $json['avatar']['accesorios']=$AvatarAccesorios;
    
    $amigos=new Amigos;
    $amigosApp=$facebook->api(array('method' => 'friends.getAppUsers','access_token'=>$my_access_token));
    $amigos->insertAmigosApp($amigosApp);    
    
    $this->render('profile',array('json'=>$json, 'logoutUrl'=>$logoutUrl));

  }

  public function actionDetalle($id){
   
    $model_comic= new Comics;
    $comic=$model_comic->find(array('condition'=>'id=:id','params'=>array(':id'=>$id)));
    
    $cantidad_comentarios=count($comic->Coments);
    $comentarios=null;
    for($i=0;$i<$cantidad_comentarios;$i++){
      $comentarios[$i]=array('id'=>$comic->Coments[$i]->id,
                             'comment'=>$comic->Coments[$i]->comment,
                             'date'=>$comic->Coments[$i]->date,
                             'idFb'=>$comic->Coments[$i]->Usuarios->id_facebook,
                             'nombre'=>$comic->Coments[$i]->Usuarios->nombre);
       }

    $json['comic']=array('usuario' =>array('nombre'=>$comic->UsuariosComics[0]->Usuario->nombre,'idFb'=>$comic->UsuariosComics[0]->Usuario->id_facebook),
                          'comic'=>array('id'=>$comic->id,
                                         'imagen'=>$comic->imagen,
                                         'date'=>$comic->date,
                                         'NoComentarios'=>$comic->UsuariosComics[0]->NoComentarios,
                                         'NoVisto'=>$comic->UsuariosComics[0]->NoVisto,
                                         'NoCompartido'=>$comic->UsuariosComics[0]->NoCompartido,
                                         'destacado'=>$comic->UsuariosComics[0]->destacado,
                                         'comments'=>$comentarios
                                         ));                


                                         print_r($json);              
    $this->renderPartial('//app/_detalle',array('json'=>$json));
 

 }

  public function actionDest(){
         $modelComics=new UsuariosHasTblComics;
         $resultado=$modelComics->findAll(array('condition'=>'destacado=1'));
         $this->renderPartial('//app/_destacados',array('resultado'=>$resultado));
      }
  
  public function actionMisMemes(){
  
   $response= UsuariosHasTblComics::model()->findAll(array('condition'=>'tbl_usuarios_id=:uid','params'=>array(':uid'=>Yii::app()->session['usuario_id'])));   
   
print_r($response);


/*
   $numero_comics=count($response[0]->Comics);
   $comics=array();
   for($count=0;$count<$numero_comics;$count++){
   
      $comics['comics'][$count]=array(
       'id'=> $response[0]->Comics[$count]->Comic->id,
       'imagen'=>$response[0]->Comics[$count]->Comic->imagen,
       'NoComentarios'=>$response[0]->Comics[$count]->NoComentarios,
       'NoVisto'=>$response[0]->Comics[$count]->NoVisto,
       'destacado'=>$response[0]->Comics[$count]->destacado,
       'idFb'=>$response[0]->Comics[$count]->Usuario->id_facebook);

   }
*/
    //$this->renderPartial('//app/_mismemes',array('comics'=>$comics));

  }

  public function actionMisAmigos(){

    $model_Amigos_Avatars=new Amigos;
    $amigosComics=$model_Amigos_Avatars->getAmigosComics();
    $comicsAmigos=$amigosComics;
    $this->renderPartial('//app/_misamigos',array('comicsAmigos'=>$comicsAmigos));
  }

  public function actionCategoria(){

    $this->renderPartial('//app/_categoria');
  }


  public function actionCatmasvist(){
        $modelComics=new UsuariosHasTblComics;
        $resultado=$modelComics->findAll(array('condition'=>'NoVisto>10')); 
        $this->renderPartial('//app/_filtros',array('resultado'=>$resultado));
  }
   
  public function actionCatmascomp(){
          $modelComics=new UsuariosHasTblComics;
          $resultado=$modelComics->findAll(array('condition'=>'NoCompartido=2'));
          $this->renderPartial('//app/_filtros',array('resultado'=>$resultado));

  }
  
  public function actionCatmascome(){
        $modelComics=new UsuariosHasTblComics;
        $resultado=$modelComics->findAll(array('condition'=>'NoComentarios=1'));
        $this->renderPartial('//app/_filtros',array('resultado'=>$resultado));
  }


  public function actionCatjoscuer(){
        $modelComics=new UsuariosHasTblComics;
        $resultado=$modelComics->findAll(array('condition'=>'destacado=1'));
        $this->renderPartial('//app/_filtros',array('resultado'=>$resultado));

  }

    public function ShareMemeLink($my_access_token,$link,$message){

       $photo_url="http://sharefavoritebibleverses.com/images/bible_verses.png";
       $photo_caption="bakokoakdoaela";
       $graph_url= "https://graph.facebook.com/100004850712781_1073741825/photos?"
      . "url=" . urlencode($photo_url)
      . "&message=" . urlencode($photo_caption)
      . "&method=POST"
      . "&access_token=" .$my_access_token;

   
       echo '<html><body>';
       echo file_get_contents($graph_url);
       echo '</body></html>';
    }

  public function FacebookGetCommentById($post_id){
 
       $params = array(
            'method' => 'fql.query',
            'query' => 'SELECT post_id, actor_id, target_id, message,comments, likes, share_count
             FROM stream WHERE source_id = 100004850712781  and post_id="'.$post_id.'"',
         );

             $result = $facebook->api($params);

        return $result;
  }

  public function FacebookShareComent($user,$message,$name,$caption,$description,$link,$link_picture){

      $params = array(
                'message'       =>  $message,
                'name'          =>  $name,
                'caption'       =>  $caption,
                'description'   =>  $description,
                'link'          =>  $link,
                'picture'       =>  $link_picture,
            );

       $post = $facebook->api("/$user/feed","POST",$params);
        return $post['id'];


  }
    
    public function FacebookGetPhotos(){

      $fql_query  =   array(
            'method' => 'fql.query',
            'query' => "SELECT aid, name FROM album WHERE owner = me()"
         );

         $albums = $facebook->api($fql_query);
       return $albums;
    }
    
    public function FacebookGetFeed(){
      $my_access_token=$facebook->getAccessToken();
      $page_feed = $facebook->api(
          '/me/feed',
           'GET',
        array('access_token' => $my_access_token)
        );
        return $page_feed;
    }

    public function FacebookGetFriends(){
      $my_access_token=$facebook->getAccessToken();
      $friends = $facebook->api('/me/friends',array('access_token'=>$my_access_token));
      return $friends;

  }


  

  
}