<?php
$this->breadcrumbs=array(
	'Memes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Memes', 'url'=>array('index')),
	array('label'=>'Manage Memes', 'url'=>array('admin')),
);
?>

<h1>Create Memes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>