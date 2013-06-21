<?php
$this->breadcrumbs=array(
	'Accesorioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Accesorios', 'url'=>array('index')),
	array('label'=>'Manage Accesorios', 'url'=>array('admin')),
);
?>

<h1>Crear Nuevo Accesorio</h1>

<div style="float:'left';">
  <a href="<?php echo CController::createUrl('/accesorios'); ?>">Regresar</a>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>