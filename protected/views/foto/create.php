
<h1>Tomar  Fotografia</h1>

        <div style='margin-left:-100px; margin-top:-80px'>
        <!--<a href="/noosbit_pf/index.php/elemento/menu"><img src="<?php echo Yii::app()->baseUrl."/images/back.png"; ?>" style='cursor:pointer;'></a>-->
        </div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<?php  
  //Yii::app()->clientScript->registerCoreScript('jquery');
  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/js/webcam.js');
  
  $cs->registerScript(
  'configuration-script_webcam',
  'webcam.set_api_url("/jcuervo/index.php/App/SaveFoto");
		webcam.set_quality( 90 ); // JPEG quality (1 -100)
		webcam.set_shutter_sound( true ); // play shutter click sound
		webcam.set_NoExpediente(1);     ',
  CClientScript::POS_HEAD
);

  $cs->registerScript(
  'jquery',
  ' var  visible=0;
		$(".espacio_camara").before(webcam.get_html(320, 250));
	;       ',
  CClientScript::POS_READY
);
?>
