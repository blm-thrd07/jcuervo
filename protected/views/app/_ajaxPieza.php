<?php 

foreach ($piezas as $key => $value) {
	//echo $value->url." ";
	//vecho CHtml::ajaxLink($value->url, CController::CreateUrl('app/UpdatePieza'),array('id'=>uniqId(), 'live'=>false,/*'update' => '#data',*/'type'=>'POST','data'=>'pieza_id='.$value->id.'&accion=INSERTAR'))." ";
	echo CHtml::link($value->url, "#", array('class'=>"insertar",'name'=>$value->id))." "; 

}
