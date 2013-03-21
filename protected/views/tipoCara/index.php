<?php
$this->breadcrumbs=array(
	'Tipo Caras',
);

$this->menu=array(
	array('label'=>'Create TipoCara', 'url'=>array('create')),
	array('label'=>'Manage TipoCara', 'url'=>array('admin')),
);
?>

<h1>Tipo Caras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
