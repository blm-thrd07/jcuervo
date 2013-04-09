
(function() {


//navigation menu
  $(".menu").live("click",function(){
      var url=$(this).attr("id");
      $.ajax({
          type: "GET",
          url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/"+url,
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
            url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/"+url,
            success: function(data){
               $(".response").html(data);
            }
          });
        return false;
  });

  $(".cdetail").live('click',function(){

     alert('hola');

  });


  $(".com").live('click',function(){
         
         var comicid= $(this).attr('id');  
         var comentario= $("#com").val();

          $.ajax({
            type: "POST",
            data:"UsuariosComicsComentarios[tbl_comics_id]="+comicid+"&UsuariosComicsComentarios[comment]="+comentario,
            url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/UsuariosComicsComentarios/create",
            success: function(data){
               $("#comics").html(data);
            }
          });


  });

$(".share").live('click',function(){
    var comicid= $(this).attr('id');
    
    $.ajax({
            type: "POST",
            data:"id="+comicid,
            url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/comics/share/"+comicid,
            success: function(data){
               alert(data+'hols');
            }
          });

});




}).call(this);

$(".js-lightbox").fancybox({
      maxWidth: 810,
      maxHeight: 600,
      fitToView: false,
      width: "70%",
      height: "70%",
      autoSize: false,
      closeClick: false,
      openEffect: "none",
      closeEffect: "none"
    });

FB.init({ appId:'342733185828640',cookie:true,status:true,xfbml:true});

  function FacebookInviteFriends()
  { 
      FB.ui({method: 'apprequests', message: 'Generador de Memes Jose Cuervo'});
      return false;
  }

