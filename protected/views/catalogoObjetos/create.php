<?php
$this->breadcrumbs=array(
	'Catalogo Objetoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CatalogoObjetos', 'url'=>array('index')),
	array('label'=>'Manage CatalogoObjetos', 'url'=>array('admin')),
);
?>

<h1>Create CatalogoObjetos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>