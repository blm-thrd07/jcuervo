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
    <div class="saveBtn"><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar       </a></div>
    <div class="js-tabEngine itemSelector">
      <ul>
        <li><a href="#tab1">Fondos</a></li>
        <li><a href="#tab2">Objetos</a></li>
        <li><a href="#tab3">Amigos</a></li>
      </ul>
      <div id="tab1" class="comicThumbs">
       <? 
        $bandera=false;
        $count=count($fondos);
          if(is_array($fondos)){
            if($count>12) echo '<div class="js-slides"><div class="slides_container">';
            foreach ($fondos as $key => $value) {  
              if($key%12==0 && $count>12) {
                if($bandera) echo '</div>'; else $bandera=true;
                echo '<div class="slide">';
              }
              echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/backgrounds/".$value['url'],"backgrounds",array('id'=>$value['id_background'])).'</div>'; 
            }
            if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
          }
      ?>
      </div>
      <div id="tab2" class="comicThumbs">
        <? 
          $bandera=false;
          $count=count($objetos);
            if(is_array($objetos)){
              if($count>12) echo '<div class="js-slides"><div class="slides_container">';
              foreach ($objetos as $key => $value) {  
                if($key%12==0 && $count>12) {
                  if($bandera) echo '</div>'; else $bandera=true;
                  echo '<div class="slide">';
                }
                echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/objetos/".$value['url'],"objetos",array('id'=>$value['id'])).'</div>'; 
              }
              if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
            }
        ?>
      </div>
      <div id="tab3" class="comicThumbs">
        <? 
          $bandera=false;
          $count=count($amigos_avatars);
            if(is_array($amigos_avatars)){
              if($count>12) echo '<div class="js-slides"><div class="slides_container">';
              foreach ($amigos_avatars as $key => $value) {  
                if($key%12==0 && $count>12) {
                  if($bandera) echo '</div>'; else $bandera=true;
                  echo '<div class="slide">';
                }
                echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$value['avatar_img'],"amigos_avatars",array('id'=>$value['usuario_id'])).'</div>'; 
              }
              if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
            }
        ?>
      </div>
    </div>
  </section>
</div>
<?php
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/slides.min.jquery.js'); 
?>
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
 
  var angle,cuerpos,init,rotation,imageBackground,conf,halfx,halfy, currentSelected, init, insertCabeza, insertCuerpo, layerComic, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stageComic,removeImage;
  currentSelected = null;
  currentText = null;
  var amigos=[], objetos=[];
  var scale = 1;
  var scaleUpFactor= 1.05;
  var trans = null;
  $(".js-tabEngine").easytabs({animate:!0,animationSpeed:150,tabActiveClass:"selected",updateHash:!1});
  $(".js-slides").slides({preload:!1,slideSpeed:450,generatePagination:!1,generateNextPrev:!1});

  /*$(function() {
    $(".lazy").lazyload({
      effect: "fadeIn"
    });
    return setTimeout((function() {
      $(window).trigger("scroll");
      console.log(":)");
      //return layerComic.draw();
    }), 100);
  });*/
  stageComic = new Kinetic.Stage({
    container: "comicCanvas",
    width: 392,
    height: 294,
  });
  stageComic.getContainer().addEventListener("click", function(evt) { 
      console.log("stage");
      if(currentSelected){
        currentSelected.setStroke(null);
        currentSelected.setStrokeWidth(0);
        currentSelected=null;
        layerComic.draw(); 
      }
    });
  halfx = stageComic.getWidth() / 2;
  halfy = stageComic.getHeight() / 2;
  confAvatar = {
      x: halfx,
      y: halfy,
      height: 200,
      width: 140,
      draggable: true,
      offset: [100, 70],
      name: "amigo"
    };
  confObjeto = {
      x: halfx,
      y: halfy,
      height: 100,
      width: 100,
      draggable: true,
      offset: [50, 50],
      name: "objeto"
    };
  confBackground = {
      x: 0,
      y: 0,
      rotation: 0,
      height: 392,
      width: 294,
      image: imageBackground,
      offset: [196, 147],
      name: "fondo",
      id: 1
    };
  layerFondo = new Kinetic.Layer();
  layerComic = new Kinetic.Layer();
  stageComic.add(layerFondo);
  stageComic.add(layerComic);

  imageBackground = new Image();
  fondo = new Kinetic.Image(confBackground);
  imageBackground.src="'.Yii::app()->request->baseUrl.'/images/backgrounds/default.png";
  layerFondo.add(fondo);

  console.log("onclick");
  $("#tab1 .itemMeme").on("click", function(e){ var id = $(this).find("img").attr("id"); insertarFondo($(this).find("img").attr("src")); });
  $("#tab2 .itemMeme").on("click", function(e){ confObjeto.id = $(this).find("img").attr("id"); insertar("objeto",$(this).find("img").attr("src"),confObjeto); });
  $("#tab3 .itemMeme").on("click", function(e){ confAvatar.id = $(this).find("img").attr("id"); insertar("amigo",$(this).find("img").attr("src"),confAvatar); });
  $(".itemSelector a").on("click", function() {
    console.log("you hace clicked a tab btn");
    setTimeout(function(){
      console.log("cargado");
    },3000);
  });

  saveToImage = function() {
    console.log("save");
    $("#overlay").css("display","block"); 
    $("#popup").css("display","block"); 
    $("#popup").fadeIn("slow");

    stageComic.toDataURL({
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
    var json = JSON.parse(layerComic.toJSON()); 
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
    currentText.remove();
    currentSelected.remove();
    layerComic.draw();
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
    layerComic.draw();
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

  function insertarFondo(img) {
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    imageBackground.src="'.Yii::app()->request->baseUrl.'/images/backgrounds/"+img;
    layerFondo.draw();
    layerComic.moveToTop();
  };

  function insertar(obj,img,conf) {
    var aux, insertar=true;
    aux=obj;
    if(typeof conf.id==="undefined") { insertar=false; console.log("undefined"); } 
    if(obj==="objeto"){ 
      for(i=0;i<objetos.length;i++){
        if(objetos[i].attrs.id == conf.id) insertar=false;
      }
    }
    if(obj==="amigo"){ 
      for(i=0;i<amigos.length;i++){
        if(amigos[i].attrs.id == conf.id) insertar=false;
      }
    }

    if(insertar){
      imageObj = new Image();
      conf.image = imageObj;
      obj = new Kinetic.Image(conf);
      console.log(img);
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      console.log(img);
      imageObj.src="'.Yii::app()->request->baseUrl.'/Avatar/"+img;
      
      obj.on("mouseover", function() {
        if(!currentSelected){
          this.setStroke("980d2e");
          this.setStrokeWidth(1);
          return layerComic.draw();
        }
        console.log(this.toJSON());
      });

      obj.on("mouseout", function() {
        if(!currentSelected){
          this.setStroke(null);
          this.setStrokeWidth(0);
        }
        return layerComic.draw();
      });

      obj.on("click", function() {
        if(currentSelected){
          currentSelected.setStroke(null);
          currentSelected.setStrokeWidth(0);
        }
        currentSelected = this;
        currentSelected.setStroke("980d2e");
        currentSelected.setStrokeWidth(1);
        layerComic.draw();
      });
      
      obj.on("dragstart", function() {
        if(currentSelected){
          currentSelected.setStroke(null);
          currentSelected.setStrokeWidth(0);
        }
        currentSelected = this;
        currentSelected.setStroke("980d2e");
        currentSelected.setStrokeWidth(1);
        layerComic.draw();
        if (trans) {
          trans.stop();
        }
        return this.setAttrs({
          scale: {
            x: this.attrs.startScale * scaleUpFactor,
            y: this.attrs.startScale * scaleUpFactor
          }
        });
      });

      obj.on("dragend", function() {
        console.log(this.getZIndex());
        trans = this.transitionTo({
          duration: 0.5,
          easing: "elastic-ease-out",
          scale: {
            x: this.attrs.startScale,
            y: this.attrs.startScale
          }
        });
        layerComic.draw();
      });
      layerComic.add(obj);
      if(aux==="objeto"){ 
        objetos.push(obj);
      }
      if(aux==="amigo"){ 
        amigos.push(obj);
      }
      console.log(obj.toJSON());
      layerComic.draw();
      return true;
    }
    
    console.log("NO SE INSERTO");
    return false;
  };

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

  $("#js-listenerStat").on("click", saveToImage);
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage);
  $("#js-sendBack").on("click", sendBack);
  $("#js-resetRotation").on("click", resetRotation);
  $("#js-insertText").on("click", insertText);
  $("#js-createText").on("click", createText);

  confAvatar.id=2; //quit
  confAvatar.name="MiAvatar";
  insertar("MiAvatar","'.$avatar['avatar_img'].'",confAvatar)

  $(document).ready(function() {
    console.log("ready");
    setTimeout(function(){ layerFondo.draw(); layerComic.draw(); },3000);

  });
  
    
',CClientScript::POS_END);

?>