<?

//echo "<a href='".$loginUrl."' target='_self'>Login</a>";

?>

    <button id="login">Login</button><br/>
    <button id="checkPerms">Check Permissions</button><br/>
    <button id="removePerms">Remove Permissions</button>
    <div id="fb-root"></div>

    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script>
    FB.init({
      appId  : '342733185828640',
      status : true, // check login status
      cookie : true, // enable cookies
      xfbml  : true, // parse XFBML
      oauth  : true // enable OAuth 2.0
    });

    // Permissions that are needed for the app
    var permsNeeded = ['email', 'read_stream', 'user_likes'];
    
    // Function that checks needed user permissions
    var checkPermissions = function() {
      FB.api('/me/permissions', function(response) {
        var permsArray = response.data[0];

        var permsToPrompt = [];
        for (var i in permsNeeded) {
          if (permsArray[permsNeeded[i]] == null) {
            permsToPrompt.push(permsNeeded[i]);
          }
        }
        
        if (permsToPrompt.length > 0) {
          alert('Need to re-prompt user for permissions: ' + 
            permsToPrompt.join(','));
          promptForPerms(permsToPrompt);
        } else {
          alert('No need to prompt for any permissions');
        }
      });
    };
    
    // Re-prompt user for missing permissions
    var promptForPerms = function(perms) {
        FB.login(function(response) {
          console.log(response);
        }, {scope: perms.join(',')});
    };

    var removePermissions = function(perms) {
      FB.api(
          {
            method: 'auth.revokeExtendedPermission',
            perm: perms.join(',')
          },
          function(response) {
            console.log(response);
          }
      ); 
    };

    document.getElementById("login").onclick = function() {
      FB.login(function(response) {
        console.log(response);
      }, {scope: permsNeeded.join(',')});
    };

    document.getElementById('checkPerms').onclick = function() {
      checkPermissions();
    };

    document.getElementById('removePerms').onclick = function() {
      removePermissions(['read_stream']);
    };
   </script>	
