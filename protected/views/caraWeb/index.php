<?php
$this->breadcrumbs=array(
	'Cara Webs',
);

$this->menu=array(
	array('label'=>'Create CaraWeb', 'url'=>array('create')),
	array('label'=>'Manage CaraWeb', 'url'=>array('admin')),
);
?>

<h1>Cara Webs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
