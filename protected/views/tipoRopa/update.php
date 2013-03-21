<?php
$this->breadcrumbs=array(
	'Tipo Ropas'=>array('index'),
	$model->id_tipo_ropa=>array('view','id'=>$model->id_tipo_ropa),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoRopa', 'url'=>array('index')),
	array('label'=>'Create TipoRopa', 'url'=>array('create')),
	array('label'=>'View TipoRopa', 'url'=>array('view', 'id'=>$model->id_tipo_ropa)),
	array('label'=>'Manage TipoRopa', 'url'=>array('admin')),
);
?>

<h1>Update TipoRopa <?php echo $model->id_tipo_ropa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>