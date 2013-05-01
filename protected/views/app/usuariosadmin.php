
<h2> Administrador Usuarios</h2>

<a href="<?php echo CController::createUrl('app/admin'); ?>">Regresar</a>
<div id="myerrordiv"></div>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-comic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'ajaxUpdate' => true,
	'columns'=>array(
		'id',
		'imagen',
		'date',
		array(
            'header' => 'esta oculto?',
            'name' => 'isHidden',
            'value' => '($data->isHidden == 0) ? "No" : "Si"'
        ),
        array(
            'header' => 'esta oculto?',
	        'name'=>'isHidden',
	        'value'=>'CHtml::checkBox("cb_hidden",$data->isHidden,array("value"=>$data->id))',
	        'type'=>'raw',
	        'htmlOptions'=>array('width'=>5),
	        //'visible'=>false,
        ),
        array(
            'header' => 'es Especial?',
	        'name'=>'isSpecial',
	        'value'=>'CHtml::checkBox("cb_special",$data->isSpecial,array("value"=>$data->id))',
	        'type'=>'raw',
	        'htmlOptions'=>array('width'=>5),
	        //'visible'=>false,
        ),
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); 


