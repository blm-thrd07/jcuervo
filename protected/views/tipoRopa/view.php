<?php
$this->breadcrumbs=array(
	'Tipo Ropas'=>array('index'),
	$model->id_tipo_ropa,
);

$this->menu=array(
	array('label'=>'List TipoRopa', 'url'=>array('index')),
	array('label'=>'Create TipoRopa', 'url'=>array('create')),
	array('label'=>'Update TipoRopa', 'url'=>array('update', 'id'=>$model->id_tipo_ropa)),
	array('label'=>'Delete TipoRopa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_ropa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoRopa', 'url'=>array('admin')),
);
?>

<h1>View TipoRopa #<?php echo $model->id_tipo_ropa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_ropa',
		'tipo_ropa',
	),
)); ?>
