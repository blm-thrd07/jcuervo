<?php
$this->breadcrumbs=array(
	'Ropas'=>array('index'),
	$model->id_ropa=>array('view','id'=>$model->id_ropa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ropa', 'url'=>array('index')),
	array('label'=>'Create Ropa', 'url'=>array('create')),
	array('label'=>'View Ropa', 'url'=>array('view', 'id'=>$model->id_ropa)),
	array('label'=>'Manage Ropa', 'url'=>array('admin')),
);
?>

<h1>Update Ropa <?php echo $model->id_ropa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>