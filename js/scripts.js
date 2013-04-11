
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
     var comicid=$(this).attr('id');
        $.ajax({
            type: "POST",
            data:"UsuariosHasTblComics[tbl_comics_id]="+comicid,
            url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/UsuariosHasTblComics/UpdateViews",
            success: function(data){
            
            }
          });
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




 $('#cropbox').live('click',function(){
        $(this).Jcrop({
        aspectRatio: 1,
         onSelect: updateCoords
        });
    });
  var x,y,w,h;
  
  function updateCoords(c)
  {
     x=c.x;
     y=c.y;
     w=c.w;
     h=c.h;
    return false;
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

$('#spic').live('click',function(){
  
  if(parseInt(w)){
      $.ajax({
            type: "POST",
            data:"x="+parseInt(x)+"&y="+parseInt(y)+"&w="+parseInt(w)+"&h="+parseInt(h),
            url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/CaraWeb/Edit",
            success: function(data){

              $('#caraweb').html('<img src="' + data + '"id="cropbox" >');

            }
          });
      }

  });




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






