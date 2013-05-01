
<h2> Administrador Usuarios</h2>

<a href="<?php echo CController::createUrl('app/admin'); ?>">Regresar</a>
<div id="myerrordiv"></div>
<?php
//$image = CHtml::image($imageUrl, $data->name, array('class' => 'deals_product_image'));

//echo CHtml::link($image, array('items/viewslug', 'slug'=>$data->slug));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'ajaxUpdateError'=>'function(xhr,ts,et,err){ $("#myerrordiv").text(err); }',
	'columns'=>array(
		array(
            'header' => 'Facebook', 
	        'value'=>'  CHtml::link(CHtml::image("https://graph.facebook.com/".$data->id_facebook."/picture"), array("items/viewslug", "slug"=>$data->slug)) ',
	        'type'=>'raw',
	        //'htmlOptions'=>array('width'=>30),
        ),
		'correo',
		'nombre',
		'idFb',
		array(
            'header' => 'es Fan?',
            'name' => 'isFan',
            'value' => '($data->isFan == 0) ? "No" : "Si"'
        ),
        array(
            'header' => 'comics creados',
	        'value'=>' count( UsuariosHasTblComics::getMyComics($data->id) ) ',
	        'type'=>'raw',
	        'htmlOptions'=>array('width'=>5),
        ),
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>


