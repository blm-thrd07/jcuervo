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
        'actions'=>array('view','Logout','login','Dest','error'),
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

public function actionLogin($admin=null){

  if(isset($_REQUEST['admin'])) {
    $this->render('admin');
    Yii::app()->end();
  }
    
  //header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
   header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');


       $facebook = new facebook(array(
        'appId'  => '342733185828640',
        'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
        ));
       
        $user =$facebook->getUser();


        if ($user) {
           try {
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

        //REQUEST IS FAN
        if ($_REQUEST && isset($_REQUEST['signed_request'])) {
          $signed_request = $_REQUEST['signed_request'];
          $data = $this->parse_signed_request($signed_request);
        } else {
          echo '$_REQUEST is empty';
        }
        
        //print_r($data);
        //Array ( [algorithm] => HMAC-SHA256 [expires] => 1367028000 [issued_at] => 1367022760 [oauth_token] => BAAE3tsnLRyABAMvDEnYZCpAZBbZAO2TwDS6Na5pAgBSCm5fZB6J0M7LZAxERlAqCCm52biNXkA8K6u73PPrXzMfv9tMNZAOvZAY7hfCCoBF7B0PVtlUWnIkBpnvkZCiFZADwTrjRXldKQo77SqwZCfzkD2oAzq3V5yHodkPndCpfqwv5FWowrmHHbywTlBX2HvqTQbdG2yMiHSBnuPLajhwXkhuLcR7GOIQw2i9cCBF6bBqgZDZD [page] => Array ( [id] => 573988472620627 [liked] => 1 [admin] => ) [user] => Array ( [country] => mx [locale] => es_LA [age] => Array ( [min] => 21 ) ) [user_id] => 100001421156741 )

        if($user){
            $response= Usuarios::model()->find(array('condition'=>'correo=:correo','params'=>array(':correo'=>$user_profile['email'])));

            if(count($response)==0){
              $response = new Usuarios;
              $response->correo=$user_profile['email'];
              $response->nombre=$user_profile['name'];
              $response->id_facebook=$user_profile['id'];
              $response->sexo=$user_profile['gender'];
              if($data['page']['liked']) $response->isFan = true; else $response->isFan = false;

              if($response->save(false)){
                Yii::app()->session['usuario_id']=$response->id;
                $this->redirect(array('App/Profile/'.$user_profile['id'])); 
              }
            }else{  
                Yii::app()->session['usuario_id']=$response->id;
                Yii::app()->session['id_facebook']=$response->id_facebook;
                Yii::app()->session['access_token']=$facebook->getAccessToken();
                if(isset($data)){
                  //si no es fan y ahora lo es
                  if(!$response->isFan && $data['page']['liked']) 
                  {
                    $act_user = ActividadUsuario::model()->find(array('condition'=>'tbl_usuarios_id=:uid','params'=>array(':uid'=>Yii::app()->session['usuario_id'])));
                    $response->isFan = true;
                    if(count($act_user) == 0){
                      $act_user = new ActividadUsuario;
                      $act_user->tbl_usuarios_id = Yii::app()->session['usuario_id'];
                      $act_user->tbl_actividad_actividad_id = 1;
                      $act_user->save(false);
                    } 
                    $response->save(false);
                  }
                  //si ya no quiere serlo
                  if(!$data['page']['liked']) 
                  {
                    $response->isFan = false;
                    $response->save(false);
                  }
                }
                
                $m=new Login;
                $m->username=$response->id;
                $m->login();
                //$this->redirect(array('App/Profile/'.$user_profile['id']));
                
            }
        }else{
          //$this->renderPartial('//app/login',array('loginUrl'=>$loginUrl));
        }

      
}


  public function actionLogout(){
    Yii::app()->user->logout();
  }

  public function actionProfile($id)
  {
    if($id==null) 
      throw new CHttpException(404,'The requested page does not exist.');
      
    $logoutUrl=null;
    $response= Usuarios::model()->find(array('condition'=>'id_facebook=:fbid','params'=>array(':fbid'=>$id)));   
    if($response==null){
      throw new CHttpException(404,'The requested page does not exist.');
    }
    $avatarImg=$response->Avatar->avatar_img;
    $modelComics= new UsuariosHasTblComics;
    $comics=$modelComics->getMyComics($response->id);
    $json['usuario']=array('nombre'=>$response->nombre,'id_facebook'=>$response->id_facebook,'sexo'=>$response->sexo,'avatar_img'=>$avatarImg);

    header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
 
    $facebook = new facebook(array(
      'appId'  => '342733185828640',
      'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
    ));
   
    try {
      $friends= $facebook->api(array('method' => 'friends.getAppUsers'));
      if(count($friends)!=null){
        $model_amigos=new Amigos;
        $model_amigos->insertAmigosApp($friends);
      }
      $this->render('profile',array('json'=>$json,'comics'=>$comics, 'logoutUrl'=>$logoutUrl));
    } catch (FacebookApiException $e) {
      //$loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_actions,publish_stream,email,user_birthday,read_stream','redirect_uri'=>'http://www.facebook.com/Lnx1337?sk=app_342733185828640'));
      //$this->renderPartial('//app/login',array('loginUrl'=>$loginUrl));
       $this->render('profile',array('json'=>$json,'comics'=>$comics, 'logoutUrl'=>$logoutUrl));

    }
      
  }

  public function actionDetalle($id){
    $model_comic= new UsuariosComicsComentarios;
    $json=$model_comic->getComentarios($id);
    $this->renderPartial('//app/_detalle',array('json'=>$json));
 }

  public function actionDest(){
         $modelComics=new UsuariosHasTblComics;
         $resultado=$modelComics->findAll(array('condition'=>'destacado=1'));
         $this->renderPartial('//app/_destacados',array('resultado'=>$resultado));
      }
  
  public function actionMisMemes(){


   $response= Usuarios::model()->find(array('condition'=>'id=:uid','params'=>array(':uid'=>Yii::app()->session['usuario_id'])));   
   $json['usuario']=array('nombre'=>$response->nombre,'id_facebook'=>$response->id_facebook,'sexo'=>$response->sexo);

   if(count($response)!= 0){
      $modelComics= new UsuariosHasTblComics;
      $comics=$modelComics->getMyComics($response->id);
      $this->renderPartial('//app/_mismemes',array('comics'=>$comics,'json'=>$json));
    } 

  }

  public function actionMisAmigos(){

    $model_Amigos_Avatars=new Amigos;
    $response= Usuarios::model()->find(array('condition'=>'id=:uid','params'=>array(':uid'=>Yii::app()->session['usuario_id'])));   
   
   if(count($response)!= 0){
    $amigosComics=$model_Amigos_Avatars->getAmigosComics($response->id);
    $comicsAmigos=$amigosComics;
    $cantidad_amigos=count($model_Amigos_Avatars->findAll(array('condition'=>'usuarios_id='.Yii::app()->session['usuario_id'])));
    $this->renderPartial('//app/_misamigos',array('comicsAmigos'=>$comicsAmigos,'cantidad_amigos'=>$cantidad_amigos));
    }
  }

  public function actionCategoria(){

    $modelComics=new UsuariosHasTblComics;
        $row= Yii::app()->db->createCommand('select max(NoVisto) as max from tbl_usuarios_has_tbl_comics')->queryAll();
        $cantidad=$row[0]['max'];
        if($cantidad!=null){
            $resultado=$modelComics->findAll(array('condition'=>'NoVisto <= '.$cantidad.' and NoVisto !=0 order by NoVisto desc ' ,'limit'=>5)); 
        }else{
            $resultado=null;
        }

     $this->renderPartial('//app/_categoria',array('resultado'=>$resultado));

  }


  public function actionCatmasvist(){

        $modelComics=new UsuariosHasTblComics;
        $row= Yii::app()->db->createCommand('select max(NoVisto) as max from tbl_usuarios_has_tbl_comics')->queryAll();
        $cantidad=$row[0]['max'];
        if($cantidad!=null){
            $resultado=$modelComics->findAll(array('condition'=>'NoVisto <= '.$cantidad.' and NoVisto !=0 order by NoVisto desc ' ,'limit'=>5)); 
        }else{
            $resultado=null;
        }
        
        $this->renderPartial('//app/_filtros',array('resultado'=>$resultado));
  
  }
   
  public function actionCatmascomp(){
          
          $modelComics=new UsuariosHasTblComics;
          $row= Yii::app()->db->createCommand('select max(NoCompartido) as max from tbl_usuarios_has_tbl_comics')->queryAll();
          $cantidad=$row[0]['max'];
          if($cantidad!=null){
                  $resultado=$modelComics->findAll(array('condition'=>'NoCompartido<='.$cantidad.' and NoCompartido !=0 order by NoCompartido desc ','limit'=>5));
          }else{
            $resultado=null;
          }
          $this->renderPartial('//app/_filtros',array('resultado'=>$resultado));

  }
  
  public function actionCatmascome(){
        $modelComics=new UsuariosHasTblComics;
        $row= Yii::app()->db->createCommand('select max(NoComentarios) as max from tbl_usuarios_has_tbl_comics')->queryAll();
        $cantidad=$row[0]['max'];

        if($cantidad!=null){
           $resultado=$modelComics->findAll(array('condition'=>'NoComentarios <= '.$cantidad.' and NoComentarios !=0  order by  NoComentarios desc','limit'=>5));
        }else{
           $resultado=null;
        }

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

  public function actionError()
  {
      if($error=Yii::app()->errorHandler->error)
        $this->render('error', $error);
  }

  public function parse_signed_request($signed_request) {
    list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
    $sig = $this->base64_url_decode($encoded_sig);
    $data = json_decode($this->base64_url_decode($payload), true);
    return $data;
  }

  public function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
  }

  
}