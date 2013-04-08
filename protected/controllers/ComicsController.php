<?php

class ComicsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','share'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$facebook = new facebook(array(
		   'appId'  => '342733185828640',
		   'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
		 ));

		$user =$facebook->getUser();
		$my_access_token= $facebook->getAccessToken();
		//access token

		$modelRelComics=new UsuariosHasTblComics;
		$model=new Comics;

		if(isset($_POST['img']))
		{
			$model->date=new CDbExpression('NOW()');
            $data=$_POST['img'];
	        $img = str_replace('data:image/png;base64,', '', $data);
	        $img = str_replace(' ', '+', $img);
	        $data = base64_decode($img);
	        $filename=uniqid().'.png';
	        $file =  Yii::app()->basePath.'/../Comics/'.$filename;
	        $success = file_put_contents($file, $data);
	       	$model->imagen=$filename;
	       
			if($model->save()){
                 $modelRelComics->tbl_usuarios_id=Yii::app()->session['usuario_id'];
                 $modelRelComics->tbl_comics_id=$model->id;
                 if($modelRelComics->save()){
                    $this->ShareComic($my_access_token,'https://apps.t2omedia.com.mx/php2/jcuervo/Comics/'.$filename,'Meme');
	       	 		$this->redirect(array('App/profile','id'=>$model->Usuario->id_facebook));
                 }

			}
		}
		$avatar = Avatars::model()->findByPk(Yii::app()->session['usuario_id']);
		$amigos = new Amigos;
		$objetos = CatalogoObjetos::model()->findAll();
		$backgrounds = Backgrounds::model()->findAll();
		//print_r($avatar->id);
		//print_r($avatar->avatar_img);
		//print_r($amigos->getAmigosAvatars());
		$this->render('create',array(
			'model'=>$model,
			'avatar'=>$avatar,
			'amigos_avatars'=>$amigos->getAmigosAvatars(),
			'objetos'=>$objetos,
			'backgrounds'=>$backgrounds,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comics']))
		{
			$model->attributes=$_POST['Comics'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


      public function actionShare($id){
        
        $model=Comics::model()->findByPk($id);

        $facebook = new facebook(array(
          'appId'  => '342733185828640',
          'secret' => 'f645963f59ed7ee25410567dbfd0b73f',
        ));

        $my_access_token= $facebook->getAccessToken();
        $user =$facebook->getUser();

        if ($user) {
           try {
              // Proceed knowing you have a logged in user who's authenticated.
              $user_profile =  $facebook->api('/me');
              $response=$this->ShareComic($my_access_token,'http://apps.t2omedia.com.mx/php2/jcuervo/Comics/'.$model->imagen,'Comic');
              $modelUsuariosComics=UsuariosHasTblComics::model()->find(array('condition'=>'tbl_comics_id=:cid','params'=>array(':cid'=>$id)));
			  $numeroTotal=$modelUsuariosComics->NoCompartido;
              $numeroTotal+=1;
			  $modelUsuariosComics->NoCompartido=$numeroTotal;
			  if($modelUsuariosComics->save(false)){
			     echo $response;
			  }

            } catch (FacebookApiException $e) {
               error_log($e);
               $user = null;
             }
         }
               

	 }

	  public function ShareComic($my_access_token,$link,$message){

       $photo_url=$link;
       $photo_caption=$message;
       $graph_url= "https://graph.facebook.com/100004850712781_1073741825/photos?"
      . "url=" . urlencode($photo_url)
      . "&message=" . urlencode($photo_caption)
      . "&method=POST"
      . "&access_token=" .$my_access_token;
   
      return file_get_contents($graph_url);
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Comics');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comics('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comics']))
			$model->attributes=$_GET['Comics'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Comics::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
