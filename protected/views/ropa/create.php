<?php
$this->breadcrumbs=array(
	'Ropas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ropa', 'url'=>array('index')),
	array('label'=>'Manage Ropa', 'url'=>array('admin')),
);
?>

<h1>Create Ropa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>