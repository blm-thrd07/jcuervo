<?php

class AvatarsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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

		if(isset($_POST['Avatars']))
		{
			$model->attributes=$_POST['Avatars'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
    $pieza_id = $_POST['pieza_id']; 
    $accion = $_POST['accion'];
    
    //insertar
    if(!strcmp($accion,'INSERTAR')){
      $cat_piezas = TiposPiezasAvatar::model()->findAll();
      $tipo_pieza = PiezaAvatar::model()->findByPk($pieza_id)->AvatarTipo->descripcion;
      echo $tipo_pieza;

      //recorre catalogo de tipo piezas //cuerpo//cara//caraweb//accesorios
      foreach ($cat_piezas as $k => $val) {
        //si es igual al tipo de pieza que queremos ingresar
        if(!strcmp(strtolower($tipo_pieza),strtolower($val->descripcion)) ){
          $avatar_piezas = AvatarsPiezas::model()->findAll(array('condition'=>'avatar_id=:avatar_id', 'params'=>array(':avatar_id'=>Yii::app()->session['usuario_id'])));
          //recorre todas las piezas del avatars
          $siexiste=false;
          if(is_array($avatar_piezas)){
            foreach ($avatar_piezas as $key => $value) {
              //si ya existe ese cuerpo o cara
              $descripcion = $value->AvatarImg->AvatarTipo->descripcion;
              if(strcmp(strtolower($descripcion),strtolower('accesorio')) ){
                //actualizo esa pieza_id
                $model = AvatarsPiezas::model()->find(array('condition'=>'avatar_id=:avatar_id AND pieza_id=:pieza_id', 'params'=>array(':avatar_id'=>Yii::app()->session['usuario_id'],'pieza_id'=>$value->AvatarImg->id)));
                $model->pieza_id=$pieza_id;
                if ($model->save(false)) {
                  echo "actualizado";
                } else{
                  echo "no actualizados";
                }
                $siexiste=true;
              }
              
            }
          } 
        }

        if(!$siexiste && !strcmp(strtolower($tipo_pieza),$val->descripcion)){
          $model = new AvatarsPiezas;
          $model->avatar_id = Yii::app()->session['usuario_id'];
          $model->pieza_id = $pieza_id;
          if ($model->save(false)) {
            echo "insertado";
          } else{
            echo "no";
          }
        } 
      }
     
    } else if($accion=="ACTUALIZAR"){

    }else if($accion=="ELIMINAR"){

    }
    // AvatarsPiezas::model()->findAll();
  }
}
