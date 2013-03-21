<?php
$this->breadcrumbs=array(
	'Tipo Ropas',
);

$this->menu=array(
	array('label'=>'Create TipoRopa', 'url'=>array('create')),
	array('label'=>'Manage TipoRopa', 'url'=>array('admin')),
);
?>

<h1>Tipo Ropas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
