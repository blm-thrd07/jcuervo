<?php
$this->breadcrumbs=array(
	'Tipo Ropas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoRopa', 'url'=>array('index')),
	array('label'=>'Manage TipoRopa', 'url'=>array('admin')),
);
?>

<h1>Create TipoRopa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>