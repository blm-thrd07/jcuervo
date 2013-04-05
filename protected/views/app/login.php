

<?
//echo "<a   href='".$loginUrl."'>Login</a>";
//echo "<a   href='".$loginUrl."'>Login</a>";
?>

<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
?>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.css">

<script>
  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('http://www.facebook.com/Lnx1337?sk=app_342733185828640');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream,offline_access'

document.getElementById("login").onclick = function() {
  window.top.location = oauth_url;
  }
</script>
<div id="splash">
      <h1>Memeespecial<br>Generator</h1><a id="login" href="crear-personaje.html" class="btn">Genera tu personaje</a>
      <div class="memeThumbsSlash">
        <div class="itemMeme"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
        </div>
        <div class="itemMeme"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
        </div>
        <div class="itemMeme"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
        </div>
        <div class="itemMeme"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
        </div>
        <div class="itemMeme"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
        </div>
        <div class="itemMeme"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
        </div>
      </div>
    </div>




