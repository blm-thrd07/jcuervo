<?

//echo "<a   href='".$loginUrl."'>Login</a>";

?>


<a  id="login">Login</a>
<script>
  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('http://apps.facebook.com/lnxjair');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream'

document.getElementById("login").onclick = function() {
  window.top.location = oauth_url;
  }

</script>

