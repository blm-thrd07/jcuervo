<div id="container">

  <section id="panelComic">

    <h1>Crea tu Meme</h1>

    <div id="insertText">
      <a href="#" id="js-createText" class="btn"><i class="icon-font"></i><div>Agregar texto</div></a>
      <input type="text" id="textinput" class="inputClose">
    </div>

    <div id="comicCanvas"></div>

    <div id="actions">
      <a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i><div>Rotar a la izquierda</div></a>
      <a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i><div>Rotar a la derecha</div></a>
      <a href="#" id="js-resizeDown" class="btn"><i class="icon-resize-small"></i><div>Reducir tamaño</div></a>
      <a href="#" id="js-resizeUp" class="btn"><i class="icon-resize-full"></i><div>Aumentar tamaño</div></a>
      <a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i><div>Mandar enfrente</div></a>
      <a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i><div>Mandar atrás</div></a>
      <a href="#" id="js-resetRotation" class="btn"><i class="icon-refresh"></i><div>Reestablecer</div></a>
      <a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i><div>Eliminar</div></a>
    </div>
  </section>

  <section id="panelContentComic">

    <div class="saveBtn"><a href="<?php echo CController::CreateUrl('App/Profile',array('id'=>$avatar->Usuario->id_facebook)); ?>"; class="btn"><i class="icon-chevron-left"></i> Regresar</a><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar       </a></div>

    <div class="js-tabEngine itemSelector">
      <ul class="comicItemSelector">
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
                  echo '<div class="slide itemThumbs">';
                }
                echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$value['avatar_img'],"amigos_avatars",array('id'=>$value['usuario_id'])).'<div><a href="#">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div></div>'; 
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


<?php //echo $this->renderPartial("_form', array('model'=>$model)); 

Yii::app()->getClientScript()->registerScript('registrar', '
  var url_miavatar = "'.$avatar['avatar_img'].'";
  var BaseUrl = "/php2/jcuervo";
  var angle,rotation,imageBackground,conf,halfx,halfy, currentSelected, layerComic, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stageComic,removeImage;
  currentSelected = null;
  currentText = null;
  var amigos=[], objetos=[];
  var scale = 1;
  var scaleUpFactor= 1.05, scaleDownFactor=0.95;
  var trans = null;
  $(".js-tabEngine").easytabs({animate:!0,animationSpeed:150,tabActiveClass:"selected",updateHash:!1});
  $(".js-slides").slides({preload:!1,slideSpeed:450,generatePagination:!1,generateNextPrev:!1});
  stageComic = new Kinetic.Stage({
    container: "comicCanvas",
    width: 392,
    height: 294,
    offset: [196, 147]
  });
  var rect = stageComic.getContainer().getBoundingClientRect();
  stageComic.getContainer().addEventListener("click", function(evt) { 
    console.log("stage");
    if(currentSelected){
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
      currentSelected=null;
      layerComic.draw(); 
    }
    if(currentText){
      currentText.setStroke(null);
      currentText.setStrokeWidth(0);
      currentText=null;
      layerComic.draw(); 
    }
    $("#textinput").attr("class", "inputClose");
  });

  halfx = stageComic.getWidth() / 2;
  halfy = stageComic.getHeight() / 2;

  confAvatar = { x: halfx,y: halfy,height: 230,width: 129,draggable: true,offset: [115, 65],startScale: scale,name: "amigo",tipo: "amigo"};
  confObjeto = {x: halfx,y: halfy,height: 100,width: 100,draggable: true,offset: [50, 50],startScale: scale,name: "objeto",tipo: "objeto"};
  confBackground = {x: 0,y: 0,rotation: 0,height: 392,width: 294,image: imageBackground,offset: [196, 147],startScale: scale,name: "fondo",id: 1};
  confMiAvatar = { x: halfx,y: halfy,height: 230,width: 129,draggable: true,offset: [115, 65],startScale: scale,name: "MiAvatar",tipo: "MiAvatar", id:2,};

  layerFondo = new Kinetic.Layer();
  layerComic = new Kinetic.Layer();
  stageComic.add(layerFondo);
  stageComic.add(layerComic);

  imageBackground = new Image();
  confBackground.image = imageBackground;
  imageBackground.onload = function(){
    fondo = new Kinetic.Image(confBackground);
    layerFondo.add(fondo);
    layerFondo.draw();
    layerComic.moveToTop();
  }
  imageBackground.src=BaseUrl+"/images/backgrounds/default.png";

  $("#tab1 .itemMeme").on("click", function(e){ var id = $(this).find("img").attr("id"); insertarFondo($(this).find("img").attr("src")); });
  $("#tab2 .itemMeme").on("click", function(e){ confObjeto.id = $(this).find("img").attr("id"); insertar("objeto",$(this).find("img").attr("src"),confObjeto); });
  $("#tab3 .itemMeme").on("click", function(e){ confAvatar.id = $(this).find("img").attr("id"); insertar("amigo",$(this).find("img").attr("src"),confAvatar); });

  saveToImage = function() {
    $("#overlay").css("display","block"); 
    $("#popup").css("display","block"); 
    $("#popup").fadeIn("slow");
    if(currentSelected){
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
    }
    if(currentText){
      currentText.setStroke(null);
      currentText.setStrokeWidth(0);
    }
    layerComic.draw();
    stageComic.toDataURL({
      mimeType: "image/png",
      callback: function(dataUrl) {
        var data = { img: dataUrl };
        $.ajax({
         type: "POST",
          url: BaseUrl+"/index.php/comics/create",
          data:data,
          success:function(url){
            window.location=url;
          },
          error: function(data) { 
            console.log("Vuelve a intentarlo");
            $("#overlay").css("display","none"); 
            $("#popup").css("display","none"); 
          },
        });
      }
    });
    
  };

  angle = 0.174532925;
  newangle = null;

  removeImage = function(){
    if(currentSelected) { 
      if(currentSelected.attrs.tipo === "objeto"){
        for(i=0;i<objetos.length;i++){
          if(objetos[i].attrs.id == currentSelected.attrs.id){
            o = objetos.indexOf(currentSelected)
            delete objetos[o];
            objetos.splice(o,o+1);
          }
        }
      }
      if(currentSelected.attrs.tipo === "amigo"){
        for(i=0;i<amigos.length;i++){
          if(amigos[i].attrs.id == currentSelected.attrs.id){
            o = amigos.indexOf(currentSelected)
            delete amigos[o];
            amigos.splice(o,o+1);
          }
        }
      }
      if(currentSelected.attrs.tipo != "MiAvatar")
        currentSelected.remove();
    }
    if(currentText) currentText.remove();
    $("#textinput").attr("class", "inputClose");
    layerComic.draw();
    return false;
  }

  rotateLeft = function() {
    newangle = currentSelected.getRotation() - angle;
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
    return false;
  };

  sendBack = function() {
    currentSelected.moveToBottom();
    layerComic.draw();
    return false;
  };

  function insertarFondo(img) {
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    imageBackground.src=BaseUrl+"/images/backgrounds/"+img;
    layerFondo.draw();
    layerComic.moveToTop();
  };

  console.log("stage width: "+stageComic.getWidth());
  console.log("stage height: "+stageComic.getHeight());
  console.log("stage: " + stageComic.getX() +" "+stageComic.getY());

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
      imageObj.onload = function(){ 
        //conf.width=this.width;
        //conf.height=this.height;

        obj = new Kinetic.Image(conf);
        
        obj.on("mouseover", function() {
          if(!currentSelected && !currentText){
            this.setStroke("980d2e");
            this.setStrokeWidth(1);
            return layerComic.draw();
          }
        });

        obj.on("mouseout", function() {
          if(!currentSelected && !currentText){
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
          if(currentText){
            currentText.setStroke(null);
            currentText.setStrokeWidth(0);
          }
          currentSelected = this;
          currentText = null;
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
          currentText = null;
          currentSelected.setStroke("980d2e");
          currentSelected.setStrokeWidth(1);
          layerComic.draw();
          if (trans) {
            trans.stop();
          }
          this.attrs.startScale = this.attrs.scale.x;
          return this.setAttrs({
            scale: {
              x: this.attrs.scale.x * scaleUpFactor,
              y: this.attrs.scale.y * scaleUpFactor
            }
          });
        });

        obj.on("dragend", function(e) {
          //alert("e.left" +rect.left +" e.top: "+rect.top+" e.right: "+rect.right + " rect.bottom: "+rect.bottom);
          //alert("x: "+(e.clientX-rect.left) + " y: "+(e.clientY-rect.top) + " " + (rect.right-e.clientX));
          trans = this.transitionTo({
            duration: 0.5,
            easing: "elastic-ease-out",
            scale: {
              x: this.attrs.startScale,
              y: this.attrs.startScale
            }
          });
          if( (e.clientX-rect.left) < 0 || (e.clientX-rect.left) > stageComic.getWidth() || (e.clientY-rect.top) < 0 || (e.clientY-rect.top) > stageComic.getHeight() )
          { alert("remove");
            removeImage();
          }
        });
        layerComic.add(obj);
        if(aux==="objeto"){ 
          objetos.push(obj);
        }
        if(aux==="amigo"){ 
          amigos.push(obj);
        }
        layerComic.draw();
      }
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      console.log(img);
      imageObj.src=BaseUrl+"/Avatar/"+img;

      return true;
    }
    
    console.log("No se insertó");
    return false;
  };

    initialText = "Inserta Texto";

  createText = function() {
    var texto = new Kinetic.Text({
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

    $("#textinput").attr("class", "inputOpen");
    $("#textinput").focus();
    $("#textinput").val(initialText);
    $("#textinput").select();
    currentText = texto;

    if(currentSelected){  
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
      currentSelected = null;
    }
    layerComic.draw();

    texto.on("mouseover", function() {
      if(!currentSelected && !currentText){
        this.setStroke("980d2e");
        this.setStrokeWidth(1);
        return layerComic.draw();
      }
    });

    texto.on("mouseout", function() {
      if(!currentSelected && !currentText){
        this.setStroke(null);
        this.setStrokeWidth(0);
        return layerComic.draw();
      }
    });

    texto.on("click", function() {
      $("#textinput").attr("class", "inputOpen");
      $("#textinput").focus();
      if(currentSelected){  
        currentSelected.setStroke(null);
        currentSelected.setStrokeWidth(0);
        currentSelected = null;
      }

      if(currentText){
        currentText.setStroke(null);
        currentText.setStrokeWidth(0);
        currentText = null;
      }

      this.setStroke("980d2e");
      this.setStrokeWidth(1);
      currentText = this;
      layerComic.draw();
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
      easing: "elastic-ease-out",
      scale: {
        x: 1,
        y: 1
      }
    });
    return false;
  };

  resizeDown = function(){
    if(currentSelected){
      trans = currentSelected.transitionTo({
        duration: 0.5,
        easing: "elastic-ease-out",
        scale: {
          x: currentSelected.attrs.scale.x * scaleDownFactor,
          y: currentSelected.attrs.scale.y * scaleDownFactor
        }
      });
      
    }
    if(currentText){

    }
    return false;
  }

  resizeUp = function(){
    if(currentSelected){
      trans = currentSelected.transitionTo({
        duration: 0.5,
        easing: "elastic-ease-out",
        scale: {
          x: currentSelected.attrs.scale.x * scaleUpFactor,
          y: currentSelected.attrs.scale.y * scaleUpFactor
        }
      });

    }
    if(currentText){

    }
    return false;
  }

  $("#js-listenerStat").on("click", saveToImage);
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage);
  $("#js-sendBack").on("click", sendBack);
  $("#js-resetRotation").on("click", resetRotation);
  $("#js-insertText").on("click", insertText);
  $("#js-createText").on("click", createText);
  $("#js-resizeDown").on("click", resizeDown);
  $("#js-resizeUp").on("click", resizeUp);
  $("#textinput").keyup(function(e){
    currentText.setText($(this).val());
    layerComic.draw();
    return false;
  });
  
  insertar("MiAvatar",url_miavatar,confMiAvatar);

  $(document).ready(function() {
    console.log("ready");
  });
  
    
',CClientScript::POS_END);

?>