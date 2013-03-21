<?php
$this->breadcrumbs=array(
	'Ropas'=>array('index'),
	$model->id_ropa,
);

$this->menu=array(
	array('label'=>'List Ropa', 'url'=>array('index')),
	array('label'=>'Create Ropa', 'url'=>array('create')),
	array('label'=>'Update Ropa', 'url'=>array('update', 'id'=>$model->id_ropa)),
	array('label'=>'Delete Ropa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ropa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ropa', 'url'=>array('admin')),
);
?>

<h1>View Ropa #<?php echo $model->id_ropa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ropa',
		'url',
		'complexion',
		'id_tipo_ropa',
	),
)); ?>
