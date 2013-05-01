
<h2> Administrador Usuarios</h2>

<a href="<?php echo CController::createUrl('app/admin'); ?>">Comics Admin</a>

<?php

$modelUsuarios = new Usuarios('search');
$modelUsuarios->unsetAttributes();
if(isset($_GET['Usuarios']))
	$modelUsuarios->attributes=$_GET['Usuarios'];

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-usuarios-grid',
	'dataProvider'=>$modelUsuarios->search(),
	'filter'=>$modelUsuarios,
	'ajaxUpdate' => true,
	'columns'=>array(
		'id',
		'correo',
		'nombre',
		array(
            'header' => 'es Fan?',
            'name' => 'isFan',
            'value' => '($data->isFan == 0) ? "No" : "Si"'
        ),
        array(
            'header' => 'comics creados',
	        'value'=>' echo UsuariosHasTblComics::model()->count("tbl_usuarios_id=:uid",array(":uid"=>$data->id)) ',
	        'type'=>'raw',
	        'htmlOptions'=>array('width'=>5),
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


