<div id="container">
  <section id="panelComic">
    <h1>Crea tu Meme</h1>
    <div id="insertText"><a href="#" id="js-createText" class="btn"><i class="icon-font"></i></a>
      <input type="text" id="textinput" class="inputClose"><a href="#" id="js-insertText" class="btn"><i class="icon-hand-down"></i></a><a href="#" class="btn"><i class="icon-comment"></i></a>
    </div>
    <div id="comicCanvas"></div>
    <div id="actions"><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-resizeDown" class="btn"><i class="icon-resize-small"></i></a><a href="#" id="js-resizeUp" class="btn"><i class="icon-resize-full"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-resetRotation" class="btn"><i class="icon-refresh"></i></a><a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i></a></div>
  </section>
  <section id="panelContentComic">
    <div class="saveBtn"><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar       </a></div>
    <div class="js-tabEngine itemSelector">
      <ul>
        <li><a href="#tab1">Fondos</a></li>
        <li><a href="#tab2">Objetos</a></li>
        <li><a href="#tab3">Amigos</a></li>
      </ul>
      <div id="tab1" class="comicThumbs">
        <div class="js-slides-comic">
          <div class="slides_container">
            <div class="slide">
              <div class="itemMeme"><img src="spr/cabezas/cabeza-1.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-2.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-3.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-4.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-5.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-6.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-7.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-8.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-9.png"></div>
            </div>
            <div class="slide">
              <div class="itemMeme"><img src="spr/cabezas/cabeza-10.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-11.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-12.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-13.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-14.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-15.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-16.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-17.png"></div>
              <div class="itemMeme"><img src="spr/cabezas/cabeza-18.png"></div>
            </div>
          </div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>
        </div>
      </div>
      <div id="tab2" class="comicThumbs">
        <div class="itemMeme"><img src="spr/cuerpos/cuerpo-1.png"></div>
        <div class="itemMeme"><img src="spr/cuerpos/cuerpo-2.png"></div>
        <div class="itemMeme"><img src="spr/cuerpos/cuerpo-3.png"></div>
        <div class="itemMeme"><img src="spr/cuerpos/cuerpo-4.png"></div>
        <div class="itemMeme"><img src="spr/cuerpos/cuerpo-5.png"></div>
        <div class="itemMeme"><img src="spr/cuerpos/cuerpo-6.png"></div>
      </div>
      <div id="tab3" class="comicThumbs">
        <div class="itemMeme"><img src="spr/ojos/ojos-1.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-2.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-3.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-4.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-5.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-6.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-7.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-8.png"></div>
        <div class="itemMeme"><img src="spr/ojos/ojos-9.png"></div>
      </div>
    </div>
  </section>
</div>
<div id="wrapper">
<div style="display: none;" id="overlay"></div>
<div style="display: none;" id="popup">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif" />
</div>
</div>
 
<style type="text/css">
#wrapper{
    width:1002px;
    margin:10px auto;
    text-align:center;
  }

  #overlay {
    background: #000000;
    opacity:0.5;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 10000;
  }
  
  #popup {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 20px solid #DDDDDD;
    left: 31%;
    padding: 50px;
    position: fixed;
    text-align: center;
    top: 28%;
    width: 380px;
    z-index: 20000;
    -moz-border-radius:30px 0;
  }
</style>


<?php //echo $this->renderPartial("_form', array('model'=>$model)); 

Yii::app()->getClientScript()->registerScript('registrar', '
 
  var angle,cuerpos,init,rotation,imageBackground, currentSelected, init, insertCabeza, insertCuerpo, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje,removeImage;
  currentSelected = null; init=null;
  var amigos=[], objetos=[];
  console.log("tabs engine");
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
      prevText: "←"
  });

  $(function() {
    $(".lazy").lazyload({
      effect: "fadeIn"
    });
    return setTimeout((function() {
      $(window).trigger("scroll");
      console.log(":)");
      //return layerPersonaje.draw();
    }), 100);
  });

    console.log("onclick");
    $("#tab1 .itemMeme").on("click", function(e){ var id = $(this).find("img").attr("id"); insertarFondo($(this).find("img").attr("src")); });
    $("#tab2 .itemMeme").on("click", function(e){ var id = $(this).find("img").attr("id"); insertar("objeto",id,$(this).find("img").attr("src")) });
    $("#tab3 .itemMeme").on("click", function(e){ var id = $(this).find("img").attr("id"); insertar("amigo",id,$(this).find("img").attr("src")) });
    $(".itemSelector a").on("click", function() {
      console.log("you hace clicked a tab btn");
      setTimeout(function(){
        console.log("cargado");

        //$(".bx-viewport").width
      },3000);
    });


  iniciar = function(){
    stagePersonaje = new Kinetic.Stage({
      container: "personajeCanvas",
      width: 258,
      height: 460,
    });
    
    layerFondo = new Kinetic.Layer();
    layerPersonaje = new Kinetic.Layer();
    stagePersonaje.add(layerFondo);
    stagePersonaje.add(layerPersonaje);

    imageBackground = new Image();
    fondo = new Kinetic.Image({
        x: 0,
        y: 0,
        rotation: 0,
        height: 258,
        width: 460,
        image: imageBackground,
        offset: [100, 100],
        tipo: "fondo",
        id: 1
      });
    imageBackground.src="'.Yii::app()->request->baseUrl.'/Comics/comic1.jpg";
    layerFondo.add(fondo);
    console.log("fondo agregado");

    imageMiAvatar = new Image();
    MiAvatar = new Kinetic.Image({
        x: 0,
        y: 0,
        rotation: 0,
        height: 258,
        width: 460,
        image: imageMiAvatar,
        draggable: true,
        offset: [100, 100],
        tipo: "MiAvatar",
        id: 1
      });
    imageMiAvatar.src="'.Yii::app()->request->baseUrl.'/Avatar/'.$avatar['avatar_img'].'";
    layerPersonaje.add(MiAvatar);
    layerPersonaje.moveToTop();
    //layerPersonaje.draw();
    currentSelected=MiAvatar;
  }

  saveToImage = function() {
    console.log("save");
    $("#overlay").css("display","block"); 
    $("#popup").css("display","block"); 
    $("#popup").fadeIn("slow");

    stagePersonaje.toDataURL({
      mimeType: "image/png",
      callback: function(dataUrl) {
        var data = { img: dataUrl };
        $.ajax({
         type: "POST",
          url: "'.Yii::app()->createAbsoluteUrl("comics/create").'",
          data:data,
          success:function(url){
            window.location=url;
          },
          error: function(data) { 
            alert("Vuelve a intentarlo");
            $("#overlay").css("display","none"); 
            $("#popup").css("display","none"); 
          },
        });
      }
    });
    
  };

  listenerStat = function() {
    var json = JSON.parse(layerPersonaje.toJSON()); 
    var json2 = JSON.parse(layerFondo.toJSON()); 
    console.log(json.children);
    console.log(json2.children);
  };

  angle = 0.174532925;
  newangle = null;

  removeImage = function(){
    for(i=0;i<objetos.length;i++){
      if(objetos[i].attrs.id == currentSelected.attrs.id){
        o = objetos.indexOf(currentSelected)
        delete objetos[o];
        objetos.splice(o,o+1);
      }
    }
    for(i=0;i<amigos.length;i++){
      if(amigos[i].attrs.id == currentSelected.attrs.id){
        o = amigos.indexOf(currentSelected)
        delete amigos[o];
        amigos.splice(o,o+1);
      }
    }
    currentSelected.remove();
    layerPersonaje.draw();
  }

  rotateLeft = function() {
    newangle = currentSelected.getRotation() - angle;
    console.log(newangle);
    console.log(angle);
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.5,
      easing: "ease-out",
      callback: function() {
        return console.log(currentSelected.getRotation());
      }
    });
    layerPersonaje.draw();
    return false;
  };

  rotateRight = function() {
    newangle = currentSelected.getRotation() + angle;
    console.log(newangle);
    console.log(angle);
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.5,
      easing: "ease-out",
      callback: function() {
        return console.log(currentSelected.getRotation());
      }
    });
    layerPersonaje.draw();
    return false;
  };

  sendFront = function() {
    currentSelected.moveToTop();
    layerPersonaje.draw();
    console.log("front");
    return false;
  };

  sendBack = function() {
    currentSelected.moveToBottom();
    layerPersonaje.draw();
    console.log("back");
    return false;
  };

  function insertarFondo(img) {
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    imageBackground.src="'.Yii::app()->request->baseUrl.'/img/"+img;
    layerFondo.draw();
    layerPersonaje.moveToTop();

  };

  function insertar(obj,pieza_id,img) {
    var aux, insertar=true;
    aux=obj;
    if(typeof pieza_id==="undefined") { insertar=false; alert("undefined"); } 
    if(obj==="objeto"){ 
      for(i=0;i<objetos.length;i++){
        if(objetos[i].attrs.id == pieza_id) insertar=false;
      }
    }
    if(obj==="amigo"){ 
      for(i=0;i<amigos.length;i++){
        if(amigos[i].attrs.id == pieza_id) insertar=false;
      }
    }

    if(insertar){
      imageObj = new Image();
      obj = new Kinetic.Image({
        x: 0,
        y: 0,
        rotation: 0,
        height: 300,
        width: 300,
        image: imageObj,
        draggable: true,
        offset: [100, 100],
        tipo: aux,
        id: pieza_id
      });
      console.log(img);
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      console.log(img);
      imageObj.src="'.Yii::app()->request->baseUrl.'/img/"+img;
      obj.on("mouseover", function() {
        this.setStroke("980d2e");
        this.setStrokeWidth(1);
        return layerPersonaje.draw();
      });

      obj.on("mouseout", function() {
        this.setStroke(null);
        this.setStrokeWidth(0);
        layerPersonaje.draw();
      });

      obj.on("click", function() {
        currentSelected = this;
      });
      layerPersonaje.add(obj);
      if(aux==="objeto"){ 
        objetos.push(obj);
      }
      if(aux==="amigo"){ 
        amigos.push(obj);
      }
      layerPersonaje.draw();
      return true;
    }
    
    console.log("NO SE INSERTO");
    return false;
  };

  $("#js-toImage").on("click", saveToImage);
  $("#js-listenerStat").on("click", listenerStat);
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage);
  $("#js-sendBack").on("click", sendBack);

  $("#js-resetRotation").on("click", resetRotation);
  $("#js-insertText").on("click", insertText);
  $("#js-createText").on("click", createText);

  initialText = "Inserta Texto";

  createText = function() {
    var texto;
    texto = new Kinetic.Text({
      x: 0,
      y: 0,
      text: initialText,
      fontSize: 18,
      fontFamily: "aldosemibold",
      fill: "#0000 00",
      width: 300,
      padding: 5,
      align: "left",
      draggable: true
    });
    layerComic.add(texto);
    layerComic.draw();
    $("#textinput").attr("class", "inputOpen");
    $("#textinput").focus();
    $("#textinput").val(initialText);
    $("#textinput").select();
    currentText = texto;
    texto.on("mouseover", function() {
      this.setStroke("980d2e");
      this.setStrokeWidth(1);
      return layerComic.draw();
    });
    texto.on("mouseout", function() {
      this.setStroke(null);
      this.setStrokeWidth(0);
      return layerComic.draw();
    });
    texto.on("click", function() {
      $("#textinput").attr("class", "inputOpen");
      $("#textinput").focus();
      currentText = this;
      return $("#textinput").val(this.getText());
    });
    return false;
  };

  insertText = function() {
    currentText.setText($("#textinput").val());
    $("#textinput").val("");
    $("#textinput").attr("class", "inputClose");
    layerComic.draw();
    return false;
  };

  angle = 0.34906585;

  newangle = null;

  rotateLeft = function() {
    newangle = currentSelected.getRotation() - angle;
    console.log(newangle);
    console.log(angle);
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      callback: function() {
        return console.log(currentSelected.getRotation());
      }
    });
    layerComic.draw();
    return false;
  };

  rotateRight = function() {
    newangle = currentSelected.getRotation() + angle;
    console.log(newangle);
    console.log(angle);
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      callback: function() {
        return console.log(currentSelected.getRotation());
      }
    });
    layerComic.draw();
    return false;
  };

  sendFront = function() {
    currentSelected.moveToTop();
    layerComic.draw();
    console.log("front");
    return false;
  };

  sendBack = function() {
    currentSelected.moveToBottom();
    layerComic.draw();
    console.log("back");
    return false;
  };

  resetRotation = function() {
    currentSelected.transitionTo({
      rotation: 0,
      duration: 0.3,
      callback: function() {
        return console.log(currentSelected.getRotation());
      }
    });
    layerComic.draw();
    return false;
  };

//

  $(document).ready(function() {
    console.log("ready");
    iniciar();
    setTimeout(function(){ layerFondo.draw(); layerPersonaje.draw(); },3000);



  });
  
    
',CClientScript::POS_END);

?>