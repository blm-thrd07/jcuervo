<?php

class AppController extends Controller
{
  public $layout='//layouts/main';

  var $facebook;
  var $user;
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
        'actions'=>array('view','Logout','login'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','create','profile','UpdatePieza','CrearAvatar','UpdateTipoPieza','MisMemes'),
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
       $facebook = new facebook(array(
        'appId'  => '342733185828640',
        'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
        ));
       

        //YII::app()->params['facebook']=$facebook;
        $this->user =$facebook->getUser();
        $my_access_token= $facebook->getAccessToken();


        if ($this->user) {
           try {
              // Proceed knowing you have a logged in user who's authenticated.
              $user_profile =  $facebook->api('/me');
            } catch (FacebookApiException $e) {
               error_log($e);
               $this->user = null;
             }
         }

        if ($this->user) {
            $logoutUrl = $facebook->getLogoutUrl();
        } else {
            $loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_actions,publish_stream,email,user_birthday,read_stream'));
        }

       if($this->user){
         $model = new Usuarios;
         $response= $model->findAll(array('condition'=>'correo=:correo','params'=>array(':correo'=>$user_profile['email'])));

        if(count($response)==0){

          $model->correo=$user_profile['email'];
          $model->nombre=$user_profile['name'];
          $model->id_facebook=$user_profile['id'];
          $model->sexo=$user_profile['gender'];


             if($model->save()){
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
               $this->render('login',array('loginUrl'=>$loginUrl));
       }


      //$this->_identity=new UserIdentity($this->username,$this->password);
    //  print_r(Yii::app()->user);
   //  echo file_get_contents($loginUrl);

    }


public function actionLogout(){
  Yii::app()->user->logout();
}



  public function actionProfile($id=1)
  {
   $facebook = new facebook(array(
        'appId'  => '342733185828640',
        'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
        ));

   $modelcom = Usuarios::model()->with('Comics')->findAll();
   $modelc= new UsuariosHasTblComics;
   $comic=$modelc->with('Comic.Coments')->findAll(array('condition'=>' t.tbl_usuarios_id=:id ','params'=>array(':id'=>1)));
   $logoutUrl=null;
   //$logoutUrl = $facebook->getLogoutUrl();    
   $response= Usuarios::model()->with('Avatar.AvatarP.AvatarImg','Comics.Comic.Coments')->findAll(array('condition'=>'id_facebook=:fbid','params'=>array(':fbid'=>$id)));   
   
   $model_PiezaAvatar=new CatalogoPiezas;
   $model_Accesorios=new Accesorios;
   $model_Amigos_Avatars=new Amigos;
   
   $catalogo_caras=$model_PiezaAvatar->getCatalogoCaras();
   $catalogo_cuerpos=$model_PiezaAvatar->getCatalogoCuerpos();
   $catalogo_accesorios=$model_Accesorios->getCatalogoAccesorios();
   $amigosAvatars=$model_Amigos_Avatars->getAmigosAvatars();

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
//

    $cantidad=count($response[0]->Avatar->AvatarP);
    if(count($cantidad)==0){
      $json['edit']="0"; } 
    else{ $json['edit']="1"; }

    $datosAvatar[0]="";
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

    $json['catalogos']=array('caras'=>$catalogo_caras,'cuerpos'=>$catalogo_cuerpos,'accesorios'=>$catalogo_accesorios);
    $json['usuario']=array('nombre'=>$response[0]->nombre,'idFb'=>$response[0]->id_facebook,'sexo'=>$response[0]->sexo);
    $json['avatar']=array('avataid'=>$response[0]->Avatar->id,'avatarImg'=>$response[0]->Avatar->avatar_img,'datecreated'=>$response[0]->Avatar->date_created,
    'avatarPiezas'=>$datosAvatar,'comics'=>$comics,'amigosAvatars'=>$amigosAvatars); 
  
    $amigos=new Amigos;
    $amigosApp=$facebook->api(array('method' => 'friends.getAppUsers'));
    $amigos->insertAmigosApp($amigosApp);
    
      $mcaras = CaraWeb::model()->findAll(array(
          'condition'=>'avatar_id=:avatar_id',
          'params'=>array(
              ':avatar_id'=>Yii::app()->session['usuario_id'],
            )
          ) 
        );
      $maccesorios = AvatarHasAccesorios::model()->findAll(array(
          'condition'=>'avatar_id=:avatar_id',
          'params'=>array(
              ':avatar_id'=>Yii::app()->session['usuario_id'],
            )
          ) 
        );
      
      //$model['piezas']=$m;
      $json['avatar']['avatarPiezas']['cara_web']=$mcaras;
      $json['avatar']['avatarPiezas']['accesorios']=$maccesorios;
    

    //print_r($model);
    $this->render('profile',array('json'=>$json, 'logoutUrl'=>$logoutUrl));

  }


  public function actionMisMemes(){
     $this->render('mismemes');
  }

  public function actionMisAmigos(){
   
   $this->render('misamigos');
  }

  public function actionCategoria(){

    $this->render('categoria');
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