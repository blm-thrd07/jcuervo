<?php
$this->breadcrumbs=array(
	'Memes',
);

$this->menu=array(
	array('label'=>'Create Memes', 'url'=>array('create')),
	array('label'=>'Manage Memes', 'url'=>array('admin')),
);
?>

<h1>Memes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
