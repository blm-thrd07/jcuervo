<?php
$this->breadcrumbs=array(
	'Tipo Caras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoCara', 'url'=>array('index')),
	array('label'=>'Manage TipoCara', 'url'=>array('admin')),
);
?>

<h1>Create TipoCara</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>