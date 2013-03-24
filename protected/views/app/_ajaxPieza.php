<?php 

foreach ($piezas as $key => $value) {
	echo $value->url." ";
	//echo CHtml::ajaxLink("imagen", CController::CreateUrl('app/UpdatePieza'),array('update' => '#data','type'=>'POST','data'=>'id='.$value->id));

}
