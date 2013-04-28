
<h2> Administrador </h2>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ 


$model = Usuarios::model()->findAll();

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'correo',
		'nombre',
		'isFan',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>