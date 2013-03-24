<div id="data">
<?php $this->renderPartial('_ajaxPieza', array('piezas'=>$piezas)); ?>
</div>

<?php
foreach ($TipoPiezas as $key => $value) {
	//echo CHtml::ajaxButton($value->descripcion, CController::CreateUrl('app/UpdatePieza'), array('id'=>$value->id), array('success'=>'alert("hola";'));
	echo CHtml::ajaxLink($value->descripcion, CController::CreateUrl('app/UpdateTipoPieza'),array('update' => '#data','type'=>'POST','data'=>'id='.$value->id));
 	//echo CHtml::ajaxButton ($value->descripcion, CController::CreateUrl('app/UpdatePieza'),array('update' => '#data'));
}

