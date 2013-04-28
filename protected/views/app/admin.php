
<h2> Administrador </h2>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ 

$model = new Comics('search');
$model->unsetAttributes();
if(isset($_GET['Comics']))
	$model->attributes=$_GET['Comics'];

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
	        'htmlOptions'=>array('width'=>5,'class'=>"hidden"),
	        //'visible'=>false,
        ),
        array(
            'header' => 'es Especial?',
	        'name'=>'isSpecial',
	        'value'=>'CHtml::checkBox("cb_special",$data->isSpecial,array("value"=>$data->id))',
	        'type'=>'raw',
	        'htmlOptions'=>array('width'=>5,"class"=>"special"),
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
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>


<script type="text/javascript">
	$('input[type="checkbox"]').change(function () {
        var id = $(this).val();
        var check = $(this).attr('checked');
        var tipo = $(this).attr('name');
        if(tipo==="cb_hidden"){
        	alert("hid "+id);
        }
        if(tipo==="cb_special"){
        	alert("es "+id);
        }
    });

	/*var item = $("form input:checkbox:checked");
	if(item.length==0) {
		alert('Plese select checkbox!');
		return false;
	}*/
</script>