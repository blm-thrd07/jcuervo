
(function() {


 $.fn.disableSelection = function() {
        return this
                 .attr('unselectable', 'on')
                 .css('user-select', 'none')
                 .on('selectstart', false);
    };
    
//navigation menu
  $(".menu").live("click",function(){
      var url=$(this).attr("id");
      $.ajax({
          type: "GET",
          url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/App/"+url,
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
            url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/App/"+url,
            success: function(data){
               $(".response").html(data);
            }
          });
        return false;
  });

  $(".cdetail").live('click',function(){
     var comicid=$(this).attr('id');
        $.ajax({
            type: "POST",
            data:"UsuariosHasTblComics[tbl_comics_id]="+comicid,
            url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/UsuariosHasTblComics/UpdateViews",
            success: function(data){
            
            }
          });
  });


  $(".com").live('click',function(){
         
         var comicid= $(this).attr('id');  
         var comentario= $("#com").val();
            
        if(comentario.length != 0 && comentario != false){
          $.ajax({
            type: "POST",
            data:"UsuariosComicsComentarios[tbl_comics_id]="+comicid+"&UsuariosComicsComentarios[comment]="+comentario,
            url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/UsuariosComicsComentarios/create",
            success: function(data){
               $("#comics").html(data);
               $('#com').val('');
            
            }
          });
        }

  });

  $(".delc").live('click',function(){
    if (confirm('Realmete deseas eliminar este Meme')) {
          
          var comicid=$(this).attr('id');
          $.ajax({
            type: "POST",
            url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/Comics/delete/"+comicid,
            success: function(data){
               $("#panelContent",window.parent.document).html(data);
               parent.$.fancybox.close();
            }
          });

     }

  });

  $(".delcom").live('click',function(){
    if (confirm('Realmete deseas eliminar este comentario')) {
          var comenid=$(this).attr('id');
          $.ajax({
            type: "POST",
            url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/UsuariosComicsComentarios/delete/"+comenid,
            success: function(data){
                 $('#comentario'+comenid).remove();
            }
         });
     }

  });

$(".share").live('click',function(){
    var comicid= $(this).attr('id');
    
    $.ajax({
            type: "POST",
            data:"id="+comicid,
            url: window.protocol+"apps.t2omedia.com.mx/php2/jcuervo/index.php/comics/share/"+comicid,
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






