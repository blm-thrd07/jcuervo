<div id="data">
<?php //$this->renderPartial('_ajaxPieza', array('piezas'=>$piezas),false,true); ?>
</div>

<?php
//print_r($json);
echo json_encode($json);
echo "<br><br><br>";

foreach ($json['catalogos']['cuerpos'] as $key => $value) {
	echo CHtml::link($value['url'], "#", array('class'=>"insertar",'name'=>$value['id']))." "; 
}

foreach ($json['catalogos']['caras'] as $key => $value) {
	echo CHtml::link($value['url'], "#", array('class'=>"insertar",'name'=>$value['id']))." "; 
}

if(is_array($json['catalogos']['accesorios'])){
	foreach ($json['catalogos']['accesorios'] as $key => $value) {
		echo CHtml::link($value['url'], "#", array('class'=>"insertar",'name'=>$value['id']))." "; 
	}
}

echo CHtml::link("cara_web", "#", array('class'=>"insertar",'name'=>"url_cara_web"))." "; 

//pieza//accesorio//cara_web
Yii::app()->getClientScript()->registerScript('registrar', '
	$(".insertar").live("click",function(){
		var pieza_id = $(this).attr("name");
		$.ajax({
		  type: "POST",
		  data: "pieza_id="+pieza_id+"&accion=INSERTAR&tipo=pieza",
		  success: function() {  },
		  error: function(){ alert("error"); },
		  url: "'.CController::CreateUrl('avatars/UpdatePieza').'",
		  cache:false
		});
	});
	

',CClientScript::POS_READY);




?>
