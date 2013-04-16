<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <style type="text/css"> .espacio_camara{ background-color: orange; height: auto; }</style>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    <link rel="stylesheet" href="/php2/jcuervo/css/jquery.Jcrop.css" type="text/css" /> 
    <script src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.css">
    
    <script src="/php2/jcuervo/js/jquery.Jcrop.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/webcam.js"></script>
    <link rel="stylesheet" href="/php2/jcuervo/css/jquery.Jcrop.css" type="text/css" />
    <?  $idFb = split('/', $_SERVER['PATH_INFO']); if(count($idFb)==4){ if($idFb[2]=='Profile'){ Yii::app()->session['nidFb']=$idFb[3]; } } 
        $protocol="http://"; if(isset($_SERVER['HTTPS'])){ $protocol="https://"; }else{ $protocol="http://"; }
    ?>
    <script>  window.protocol="<? echo $protocol; ?>"; </script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
  </head>
  <body class="lb">
  
  <div id="upload_results"></div>
  <div id="camaradiv"> 
    <h1>Tomar  Fotografia</h1>
    <div class="grid_3 espacio_camara alpha"></div>
      <div>
        <input class="btn" type="button" value="Parámetros" onClick="webcam.configure()" > 
        <input class="btn" type="button" value="Tomar foto" onClick="webcam.freeze()" > 
        <input class="btn" type="button" value="Guardar" onClick="do_upload()" > 
        <input class="btn" type="button" value="Otra vez" onClick="webcam.reset()" > 
      </div>
   </div>
  
  <script language="JavaScript">
  var  visible=0; 
  $(".espacio_camara").before(webcam.get_html(310, 250));
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

      if(image_url!=null){
        $('#camaradiv').css('display','none');
        document.getElementById('upload_results').innerHTML = '<h1>Delimita tu rostro dando click!</h1><br><img src="'+image_url+'" id="cropbox">'+'<button id="spic" class="btn" >Save!!</button>';       
       }
    }
    else { 
          alert("error");
    };
  }
</script>
 
 
  </body>
</html>