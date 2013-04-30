
<h2> Administrador </h2>

<?php 
/*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ 

$model = new Comics('search');
$model->unsetAttributes();
if(isset($_GET['Comics']))
	$model->attributes=$_GET['Comics'];

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cara-web-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-comic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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

echo "<br></br><br></br>";

$model = new Usuarios('search');
$model->unsetAttributes();
if(isset($_GET['Usuarios']))
	$model->attributes=$_GET['Usuarios'];

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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


<script type="text/javascript">
	var BaseUrl = "/php2/jcuervo"; 
	$('input[type="checkbox"]').change(function () {
        var id = $(this).val();
        var check = $(this).attr('checked');
        var tipo = $(this).attr('name');
        if(tipo==="cb_hidden"){
        	$.ajax({
		      type: "POST",
		      data: { id_comic: id },
		      url: BaseUrl+"/index.php/Comics/hidden",
		      success: function(data){ alert(data); },
		      error: function(data) { 
		        console.log("no eliminado");
		      }
		    });
        }
        if(tipo==="cb_special"){
        	$.ajax({
		      type: "POST",
		      data: { id_comic: id },
		      url: BaseUrl+"/index.php/Comics/special",
		      success: function(data){ alert(data); },
		      error: function(data) { 
		        console.log("no eliminado");
		      }
		    });
        }
    });

</script>