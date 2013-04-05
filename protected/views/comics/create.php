<div id="container">
      <section id="panelPersonaje">
        <h1>Nombre del Usuario</h1>
        <div id="personajeCanvas"></div>
        <div id="actions"><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-reset" class="btn"><i class="icon-refresh"></i></a><a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i></a></div>
      </section>
      <section id="panelContent">
        <h2>Crea tu Personje</h2>
        <div class="saveBtn"><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar             </a></div>
        <div class="js-tabEngine itemSelector">
          <ul>
            <li><a href="#tab1">Cabeza</a></li>
            <li><a href="#tab2">Cuerpo</a></li>
            <li><a href="#tab3">Ojos</a></li>
            <li><a href="#tab4">Boca</a></li>
            <li><a href="#tab5">Accesorios</a></li>
          </ul>
          <div id="tab1" class="memeThumbs">
             
          </div>
          <div id="tab2" class="memeThumbs">
              
          </div>
          <div id="tab3" class="memeThumbs">
           
          </div>
          <div id="tab4" class="memeThumbs">
         
          <div id="tab5" class="memeThumbs">
           
          </div>
        </div>
      </section>
    </div>


<?php

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();

//pieza//accesorio//cara_web
Yii::app()->getClientScript()->registerScript('registrar', '
  
  $(function() {
    $(".lazy").lazyload({
      effect: "fadeIn"
    });
   /*
    return setTimeout((function() {
      $(window).trigger("scroll");
      console.log(":)");
      return layerPersonaje.draw();
    }), 100);
*/
  });

  $(document).ready(function() {
    $(".js-tabEngine").easytabs({
      animate: false,
      tabActiveClass: "selected",
      updateHash: false
    });
    $(".js-slides-1, .js-slides-2, .js-slides-3, .js-slides-4, .js-slides-5, .js-slides-6").bxSlider({
      startingSlide: 1,
      pager: false,
      controls: true,
      nextText: "→",
      prevText: "←",
    });
    $("a.bx-prev, a.bx-next").bind("click", function() {
      return setTimeout((function() {
        $(window).trigger("scroll");
        return console.log("yeah");
      }), 600);
    });
    return layerPersonaje.draw();
  });


  $(document).on("ready", init);
',CClientScript::POS_READY);

?>