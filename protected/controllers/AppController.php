<?php

class AppController extends Controller
{

	var $facebook;
	var $user;
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','login','profile'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
    
		$this->facebook = new Facebook(array(
      'appId'  => '342733185828640',
      'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
     ));
    $_SESSION['facebook']=$this->facebook;


    $this->user = $this->facebook->getUser();
    $my_access_token=$this->facebook->getAccessToken();

    if ($this->user) {
       try {
          // Proceed knowing you have a logged in user who's authenticated.
          $user_profile = $this->facebook->api('/me');
        } catch (FacebookApiException $e) {
           error_log($e);
           $this->user = null;
         }
        $logoutUrl = $this->facebook->getLogoutUrl();
    } else {
        $loginUrl = $this->facebook->getLoginUrl(array('scope' => 'publish_actions,publish_stream,email,user_birthday,read_stream'));
    }

    if($this->user){

   	 $model = new Usuarios;
     $response= $model->findAll(array('condition'=>'correo=:correo','params'=>array(':correo'=>$user_profile['email'])));
    
    if(count($response)==0){

       $model->correo=$user_profile['email'];
       $model->nombre=$user_profile['fist_name']." ".$user_profile['last_name'];
       $model->id_facebook=$user_profile['id'];
       $model->id_album="12312312";
       $model->sexo="masculino";

      if($model->save())
        $this->redirect(array('App/Profile/'.$user_profile['id'])); 
        
     }else{
     	  //print_r($user_profile);
         $this->redirect(array('App/Profile/'.$user_profile['id'])); 
     }

     }else{
   	       $this->render('Login',array('loginUrl'=>$loginUrl));
     }
  }



	public function actionProfile($id)
	{
      //$my_access_token=$this->facebook->getAccessToken();

       $logoutUrl = $_SESSION['facebook']->getLogoutUrl();
       echo "<a href='".$logoutUrl."'>Logout</a>";  
       $model=new Usuarios;
       $response= $model->findAll(array('condition'=>'id_facebook=:fbid','params'=>array(':fbid'=>$id)));
       //print_r($response);
       echo $response[0]->correo;
       print_r($this->FacebookGetPhotos());
  
  //print_r()
       //$model       
	
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

             $result = $_SESSION['facebook']->api($params);

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

       $post = $_SESSION['facebook']->api("/$user/feed","POST",$params);
        return $post['id'];


	}
    
    public function FacebookGetPhotos(){

    	$fql_query  =   array(
            'method' => 'fql.query',
            'query' => "SELECT aid, name FROM album WHERE owner = me()"
         );

         $albums = $_SESSION['facebook']->api($fql_query);
       return $albums;
    }
    
    public function FacebookGetFeed(){
    	$my_access_token=$_SESSION['facebook']->getAccessToken();
    	$page_feed = $_SESSION['facebook']->api(
          '/me/feed',
           'GET',
        array('access_token' => $my_access_token)
        );
        return $page_feed;
    }

    public function FacebookGetFriends(){
      $my_access_token=$_SESSION['facebook']->getAccessToken();
      $friends = $_SESSION['facebook']->api('/me/friends',array('access_token'=>$my_access_token));
      return $friends;

	}


	

	
}