




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

  
$(document).ready(function() {
    console.log('ok go');
    $(".js-tabEngine").easytabs({
      animate: false,
      tabActiveClass: 'selected',
      updateHash: false
    });
    $(".js-slides-1, .js-slides-2, .js-slides-3, .js-slides-4, .js-slides-5, .js-slides-6").bxSlider({
      startingSlide: 1,
      pager: false,
      controls: true,
      nextText: '→',
      prevText: '←'
    });
    $("a.bx-prev, a.bx-next").bind("click", function() {
      return setTimeout((function() {
        $(window).trigger("scroll");
        return console.log('yeah');
      }), 600);
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
    return layerPersonaje.draw();
  });

  $(document).on('ready', init);

  

}).call(this);


FB.init({ appId:'342733185828640',cookie:true,status:true,xfbml:true});

  function FacebookInviteFriends()
  { 
      FB.ui({method: 'apprequests', message: 'Generador de Memes Jose Cuervo'});
      return false;
  }

