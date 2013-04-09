<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
  </head>

  <body class="lb">
   	<div style='margin-left:-100px; margin-top:-80px'>
             <a href="/jcuervo/index.php/elemento/menu"><img src="<?php echo Yii::app()->baseUrl."/images/back.png"; ?>" style='cursor:pointer;'></a>
    </div>
     
	<h1>Tomar  Fotografia</h1>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<?php  
  Yii::app()->clientScript->registerCoreScript('jquery');
  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  //$cs->registerScriptFile($baseUrl.'/js/webcam.js');
  //$cs->registerScriptFile($baseUrl.'/js/webcam.swf');
  $cs->registerScript(
  'configuration-script_webcam',
  'webcam.set_api_url("/jcuervo/index.php/CaraWeb/SaveFoto");
		webcam.set_quality( 90 ); // JPEG quality (1 -100)
		webcam.set_shutter_sound( true ); // play shutter click sound',
  CClientScript::POS_END
);

  $cs->registerScript(
  'jquery',
  ' var  visible=0;
		$(".espacio_camara").before(webcam.get_html(320, 250));
	;       ',
  CClientScript::POS_READY
);
?>


     
    <script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kinetic-v4.3.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.lazyload.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hashchange.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/webcam.js"></script>

  </body>
</html>