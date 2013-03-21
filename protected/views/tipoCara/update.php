<?php
$this->breadcrumbs=array(
	'Tipo Caras'=>array('index'),
	$model->id_tipo_cara=>array('view','id'=>$model->id_tipo_cara),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoCara', 'url'=>array('index')),
	array('label'=>'Create TipoCara', 'url'=>array('create')),
	array('label'=>'View TipoCara', 'url'=>array('view', 'id'=>$model->id_tipo_cara)),
	array('label'=>'Manage TipoCara', 'url'=>array('admin')),
);
?>

<h1>Update TipoCara <?php echo $model->id_tipo_cara; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>