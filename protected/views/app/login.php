<?

//echo "<a  target='_top' href='".$loginUrl."' target='_self'>Login</a>";

?>

<script>
  var oauth_url = 'https://www.facebook.com/dialog/oauth/';
  oauth_url += '?client_id=342733185828640';
  oauth_url += '&redirect_uri=' + encodeURIComponent('https://apps.facebook.com/YOUR_APP_NAMESPACE/');
  oauth_url += '&scope=email,read_stream,user_likes,publish_actions,publish_stream'

  window.top.location = oauth_url;
</script>

<?
/*    <a id="login" href="">Login</a>
  
    <div id="fb-root"></div>
    <script>
    FB.init({
      appId  : '342733185828640',
      status : true, // check login status
      cookie : true, // enable cookies
      xfbml  : true, // parse XFBML
      oauth  : true // enable OAuth 2.0
    });

    // Permissions that are needed for the app
    var permsNeeded = ['email', 'read_stream', 'user_likes','publish_actions','publish_stream'];
    
    // Function that checks needed user permissions
   
    
    // Re-prompt user for missing permissions
    var promptForPerms = function(perms) {
        FB.login(function(response) {
          console.log(response);
        }, {scope: perms.join(',')});
    };


    document.getElementById("login").onclick = function() {
      FB.login(function(response) {

            window.location = "https://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/login"
      }, {scope: permsNeeded.join(',')});
    };

   
   </script>

   */
   	
