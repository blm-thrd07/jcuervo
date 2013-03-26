<div id="data">
<?php $this->renderPartial('_ajaxPieza', array('piezas'=>$piezas),false,true); ?>
</div>

<?php
foreach ($TipoPiezas as $key => $value) {
	//echo CHtml::ajaxButton($value->descripcion, CController::CreateUrl('app/UpdatePieza'), array('id'=>$value->id), array('success'=>'alert("hola";'));
	echo CHtml::ajaxLink($value->descripcion, CController::CreateUrl('app/UpdateTipoPieza'),array('update' => '#data','type'=>'POST','data'=>'tipo_pieza_id='.$value->id));

 	//echo CHtml::ajaxButton ($value->descripcion, CController::CreateUrl('app/UpdatePieza'),array('update' => '#data'));
}

Yii::app()->getClientScript()->registerScript('registrar', '
	$(".insertar").live("click",function(){
		var pieza_id = $(this).attr("name");
		//alert(pieza_id);
		$.ajax({
		  type: "POST",
		  data: "pieza_id="+pieza_id+"&accion=INSERTAR",
		  success: function() {  },
		  error: function(){ alert("error"); },
		  url: "'.CController::CreateUrl('app/UpdatePieza').'",
		  cache:false
		});
	});
	

',CClientScript::POS_READY);

?>
