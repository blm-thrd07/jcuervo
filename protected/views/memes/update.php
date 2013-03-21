<?php
$this->breadcrumbs=array(
	'Memes'=>array('index'),
	$model->id_meme=>array('view','id'=>$model->id_meme),
	'Update',
);

$this->menu=array(
	array('label'=>'List Memes', 'url'=>array('index')),
	array('label'=>'Create Memes', 'url'=>array('create')),
	array('label'=>'View Memes', 'url'=>array('view', 'id'=>$model->id_meme)),
	array('label'=>'Manage Memes', 'url'=>array('admin')),
);
?>

<h1>Update Memes <?php echo $model->id_meme; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>