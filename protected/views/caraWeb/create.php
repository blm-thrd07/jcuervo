<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
  </head>

  <body class="lb">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/webcam.js"></script>

	<h1>Tomar  Fotografia</h1>

<style type="text/css">
  .espacio_camara{
    background-color: orange; height: auto;
  }

</style>

  <div class="grid_3 espacio_camara alpha"></div>

  <div>
    <input type="button" value="Parámetros" onClick="webcam.configure()" > <br>
    <input type="button" value="Tomar foto" onClick="webcam.freeze()" > <br>
    <input type="button" value="Guardar" onClick="do_upload()" > <br>
    <input type="button" value="Otra vez" onClick="webcam.reset()" > 
  </div>

 <div id="upload_results"></div>
  
<script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
<script language="JavaScript">
 
/////termina jcrops

  var  visible=0; 
  $(".espacio_camara").before(webcam.get_html(320, 250));
  //webcam.set_api_url("/jcuervo/index.php/CaraWeb/SaveFoto");
  //webcam.set_quality( 90 ); // JPEG quality (1 -100)
  //webcam.set_shutter_sound( true ); // play shutter click sound
  webcam.set_hook( 'onComplete', 'my_completion_handler' );
  function do_upload() {
    // upload to server
    document.getElementById('upload_results').innerHTML = '<h1>Guardando foto...</h1>';
    webcam.upload();
  }
  function my_completion_handler(msg) {
    // extract URL out of PHP output
    if (msg.match(/(http\:\/\/\S+)/)) {
      var image_url = RegExp.$1;
      document.getElementById('upload_results').innerHTML = '<img src="' + image_url + '" width="200" heigth="200" id="cropbox" >';
      
      // reset camera for another shot
      webcam.reset();
    }
    else { 
               alert("error");
  //document.getElementById('upload_results').innerHTML = '<img src="' + msg + '" width="300" heigth="300" >';
      
    };
  }
</script>



<?php  
  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  //$cs->registerScriptFile($baseUrl.'/js/webcam.js');
  $cs->registerScript(
  'configuration-script_webcam',' alert("conf");
  		webcam.set_api_url("/jcuervo/index.php/CaraWeb/SaveFoto");
		webcam.set_quality( 90 ); // JPEG quality (1 -100)
		webcam.set_shutter_sound( true ); // play shutter click sound',
  CClientScript::POS_END
);

  $cs->registerScript(
  'jquery',' 
  		var  visible=0; alert("before");
		$(".espacio_camara").before(webcam.get_html(320, 250));
	',
  CClientScript::POS_READY
);
?>


     
    <script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
    <!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kinetic-v4.3.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.lazyload.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hashchange.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>

  </body>
</html>