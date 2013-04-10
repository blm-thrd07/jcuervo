<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    <style type="text/css"> .espacio_camara{ background-color: orange; height: auto; }</style>
  </head>

  <body class="lb">

<div id="upload_results">

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/webcam.js"></script>
  <h1>Tomar  Fotografia</h1>
  <div class="grid_3 espacio_camara alpha"></div>

  <div>
    <input type="button" value="Parámetros" onClick="webcam.configure()" > <br>
    <input type="button" value="Tomar foto" onClick="webcam.freeze()" > <br>
    <input type="button" value="Guardar" onClick="do_upload()" > <br>
    <input type="button" value="Otra vez" onClick="webcam.reset()" > 
  </div>

  
<script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
<script language="JavaScript">
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
      //webcam.reset();
      document.getElementById('upload_results').innerHTML = '<img src="' + image_url + '" width="200" heigth="200" id="cropbox" >';       
    }
    else { 
          alert("error");
    };
  }
</script>
 
 </div>
  <script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
  </body>
</html>