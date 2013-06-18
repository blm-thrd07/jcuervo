<?php
$this->breadcrumbs=array(
	'Accesorios',
);

$this->menu=array(
	array('label'=>'Create Accesorios', 'url'=>array('create')),
	array('label'=>'Manage Accesorios', 'url'=>array('admin')),
);
?>

<h1>Accesorios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
