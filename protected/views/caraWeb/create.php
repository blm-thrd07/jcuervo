<?php
$this->breadcrumbs=array(
	'Cara Webs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaraWeb', 'url'=>array('index')),
	array('label'=>'Manage CaraWeb', 'url'=>array('admin')),
);
?>

<h1>Create CaraWeb</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>