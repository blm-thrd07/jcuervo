<?php
$this->breadcrumbs=array(
	'Memes'=>array('index'),
	$model->id_meme,
);

$this->menu=array(
	array('label'=>'List Memes', 'url'=>array('index')),
	array('label'=>'Create Memes', 'url'=>array('create')),
	array('label'=>'Update Memes', 'url'=>array('update', 'id'=>$model->id_meme)),
	array('label'=>'Delete Memes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_meme),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Memes', 'url'=>array('admin')),
);
?>

<h1>View Memes #<?php echo $model->id_meme; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_meme',
		'id_background',
		'comentario_globo',
		'id_zapato',
	),
)); ?>
