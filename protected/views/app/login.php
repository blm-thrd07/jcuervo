

<?
//echo "<a   href='".$loginUrl."'>Login</a>";
//echo "<a   href='".$loginUrl."'>Login</a>";
?>

<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
?>

<?

?>
<html>
<header>
</header>
<body>

<a  id="login">Login</a>

<script>
  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('http://www.facebook.com/Lnx1337?sk=app_342733185828640');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream,offline_access'

document.getElementById("login").onclick = function() {
  window.top.location = oauth_url;
  }
</script>

</body>
</html>

