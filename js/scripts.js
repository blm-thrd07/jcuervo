




(function() {

//navigation menu
  $(".menu").live("click",function(){
      var url=$(this).attr("id");
      $.ajax({
          type: "GET",
          url: "https://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/"+url,
          success: function(data){
            $("#panelContent").html(data);
          }
        });
      return false;
  })

  //submenu categorias
  $(".subcat").live("click",function(){
      var url=$(this).attr("id");
      //$(this).attr("class","itemAction selectedTab subcat"); 
      $.ajax({
            type: "GET",
            url: "https://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/"+url,
            success: function(data){
               $(".response").html(data);
            }
          });
        return false;
  });




}).call(this);


FB.init({ appId:'342733185828640',cookie:true,status:true,xfbml:true});

  function FacebookInviteFriends()
  { 
      FB.ui({method: 'apprequests', message: 'Generador de Memes Jose Cuervo'});
      return false;
  }

