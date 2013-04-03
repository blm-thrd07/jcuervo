

<?
//echo "<a   href='".$loginUrl."'>Login</a>";
echo "<a   href='".$loginUrl."'>Login</a>";
?>

<?

?>
<html>
<header>
</header>
<body>

<a  id="login">Login</a>

<?php if ( ! count($_COOKIE) > 0 && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari')) { ?>
<script type="text/javascript">
var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('http://www.facebook.com/Lnx1337?sk=app_342733185828640');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream'

    window.top.location.href = oauth_url;
</script>

<?php } else { ?>
<script>
  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('http://www.facebook.com/Lnx1337?sk=app_342733185828640');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream'

document.getElementById("login").onclick = function() {
  window.top.location = oauth_url;
  }
</script>

<? } ?>
</body>
</html>

