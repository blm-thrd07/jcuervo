<?php

class AvatarsController extends Controller
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
				'actions'=>array('index','view','UpdatePieza'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new Avatars;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Avatars']))
		{
			$model->attributes=$_POST['Avatars'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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
        
        if(isset($_POST['avatarImg'])){

           if(file_exists(Yii::app()->basePath.'/../Avatar/'.$model->avatar_img)){
               unlink(Yii::app()->basePath.'/../Avatar/'.$model->avatar_img);
           }

           $model->avatar_img=$_POST['avatarImg'];
           $data=$_POST['avatarImg'];
           define('UPLOAD_DIR', Yii::app()->basePath.'/../Avatar/');
	       $img = $data;
	       $img = str_replace('data:image/png;base64,', '', $img);
	       $img = str_replace(' ', '+', $img);
	       $data = base64_decode($img);
	       $filename=uniqid().'.png';
	       $file = UPLOAD_DIR .$filename;
	       $success = file_put_contents($file, $data);
	       $model->avatar_img=$filename;
	       if($model->save()){
	       	  echo "Avatar Actualizado";
	       }

         }

        if(isset($_POST['Avatars']))
	 	{
			$model->attributes=$_POST['Avatars'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}	

		/*$this->render('update',array(
			'model'=>$model,
		));
	    */
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Avatars');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Avatars('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Avatars']))
			$model->attributes=$_GET['Avatars'];

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
		$model=Avatars::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='avatars-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

  public function actionUpdatePieza(){
    //$pieza_id = $_POST['pieza_id']; 
    //$accion = $_POST['accion'];
    $avatar = $_POST['avatar'];
    foreach ($avatar as $p => $pieza) {
    	$tipo = $pieza['attrs']['tipo'];
    	$pieza_id = $pieza['attrs']['id'];
    	print_r("user_id: ".Yii::app()->session['usuario_id']."  tipo:".$tipo." pieza:".$pieza_id." - ");
    	if($tipo==TiposPiezas::CUERPO || $tipo==TiposPiezas::CARA){
	    	echo "pieza"; //
	    	/*$cat_pieza = CatalogoPiezas::model()->find(array(
	    		'condition'=>'id=:id',
	    		'params'=>array(
		    			':id'=>$pieza_id,
	    			)
	    		)	
	    	);*/
	    	$m = AvatarsPiezas::model()->find(array(
	    		'condition'=>'avatar_id=:avatar_id AND tipo_pieza_id=:tipo_pieza_id',
	    		'params'=>array(
		    			':avatar_id'=>Yii::app()->session['usuario_id'],
		    			//':pieza_avatar_id'=>$cat_pieza->id,
		    			':tipo_pieza_id'=>$tipo,
	    			)
	    		)	
	    	);

	    	//si es cara
	    	if($tipo==TiposPiezas::CARA){ 
	    		$mcaras = CaraWeb::model()->find(array(
		    		'condition'=>'avatar_id=:avatar_id',
		    		'params'=>array(
			    			':avatar_id'=>Yii::app()->session['usuario_id'],
		    			)
		    		)	
		    	);
		    	if(!count($mcaras)==0){
		    		$mcaras->delete();
		    		echo " --borrar cara web-- ";
		    	} else{
		    		echo " --no borrar cara web-- ";
		    	}
		    		
	    	}

	    	//insertar
	    	if(count($m)==0){
	    		$m=new AvatarsPiezas;
	    		$m->avatar_id=Yii::app()->session['usuario_id'];
	    		$m->pieza_avatar_id=$pieza_id;
	    		$m->tipo_pieza_id=$tipo;
	    		$m->save(false);
	    	}
	    	//actualizar
	    	else{
	    		$m->pieza_avatar_id=$pieza_id;
	    		$m->save(false);
	    	}
	    	
	    } else if($tipo==TiposPiezas::ACCESORIO){
	    	echo "accesorio";
	    	$m = AvatarHasAccesorios::model()->find(array(
	    		'condition'=>'avatar_id=:avatar_id AND accesorios_id=:accesorios_id',
	    		'params'=>array(
		    			':avatar_id'=>Yii::app()->session['usuario_id'],
		    			//':pieza_avatar_id'=>$cat_pieza->id,
		    			':accesorios_id'=>$pieza_id, //$cat_accesorios->id, //
	    			)
	    		)	
	    	);
	    	//insertar
	    	if(count($m)==0){
	    		$m=new AvatarHasAccesorios;
	    		$m->avatar_id=Yii::app()->session['usuario_id'];
	    		$m->accesorios_id=$pieza_id;
	    		$m->save(false);
	    	}
	    	//actualizar
	    	else{
	    		//nada
	    	}
	    } else if($tipo==TiposPiezas::CARA_WEB){
	    	echo "cara_web"; //
	    	
	    	$m = CaraWeb::model()->find(array(
	    		'condition'=>'avatar_id=:avatar_id',
	    		'params'=>array(
		    			':avatar_id'=>Yii::app()->session['usuario_id'],
	    			)
	    		)	
	    	);
	    	if(count($m)==0){
	    		$m = new CaraWeb;
	    		$m->url = $pieza_id;
	    		$m->save(false);
	    	}
	    	//actualizar
	    	else{
	    		$m->url = $pieza_id;
	    		$m->save(false);
	    	}
	    	$mcaras = AvatarsPiezas::model()->find(array(
	    		'condition'=>'avatar_id=:avatar_id AND tipo_pieza_id=:tipo_pieza_id',
	    		'params'=>array(
		    			':avatar_id'=>Yii::app()->session['usuario_id'],
		    			':tipo_pieza_id'=>2,
	    			)
	    		)	
	    	);
	    	
	    	if(count($mcaras)==0){
	    		
	    	}
	    	//elimina la pieza cara si existe
	    	else{
	    		$mcaras->delete();
	    	}
	    }
    }
    
  }
}
