<?php
$this->breadcrumbs=array(
	'Catalogo Objetoses',
);

$this->menu=array(
	array('label'=>'Create CatalogoObjetos', 'url'=>array('create')),
	array('label'=>'Manage CatalogoObjetos', 'url'=>array('admin')),
);
?>

<h1>Catalogo Objetoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
