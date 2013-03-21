<?php
$this->breadcrumbs=array(
	'Ropas',
);

$this->menu=array(
	array('label'=>'Create Ropa', 'url'=>array('create')),
	array('label'=>'Manage Ropa', 'url'=>array('admin')),
);
?>

<h1>Ropas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
