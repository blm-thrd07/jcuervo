<?php
$this->breadcrumbs=array(
	'Tipo Caras'=>array('index'),
	$model->id_tipo_cara,
);

$this->menu=array(
	array('label'=>'List TipoCara', 'url'=>array('index')),
	array('label'=>'Create TipoCara', 'url'=>array('create')),
	array('label'=>'Update TipoCara', 'url'=>array('update', 'id'=>$model->id_tipo_cara)),
	array('label'=>'Delete TipoCara', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_cara),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoCara', 'url'=>array('admin')),
);
?>

<h1>View TipoCara #<?php echo $model->id_tipo_cara; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_cara',
		'tipo_cara',
		'css',
	),
)); ?>
