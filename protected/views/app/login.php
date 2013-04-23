<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
?>

<html>
<head>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.css">
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
</head>
<body>
<div id="splash">
      <h1>Memeespecial<br><span>Generator</span></h1><a id="login"  class="btn">Genera tu meme</a>
      <div>
        <div class="itemThumbnail"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/50x50.png"></a></div>
        </div>
        <div class="itemThumbnail"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/50x50.png"></a></div>
        </div>
        <div class="itemThumbnail"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/50x50.png"></a></div>
        </div>
        <div class="itemThumbnail"><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
          <div><a href="amigo.html"><img src="http://placehold.it/50x50.png"></a></div>
        </div>
      </div>
    </div>

<script>
  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('http://www.facebook.com/Lnx1337?sk=app_342733185828640');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream,offline_access'

document.getElementById("login").onclick = function() {
   window.top.location = oauth_url;
   console.log(oauth_url);
  return false;
  }
</script>
</body>
</html>




