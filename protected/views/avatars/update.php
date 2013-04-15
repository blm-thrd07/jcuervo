<div id="container">
    <div id="caraweb"></div>

      <section id="panelPersonaje">
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div id="personajeCanvas"></div>
        <div id="actions">
          <a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a>
          <a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a>
          <a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a>
          <a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a>
          <a href="#" id="js-resetRotation" class="btn"><i class="icon-refresh"></i></a>
          <a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i></a></div>
      </section>

      <section id="panelContent">
        <h2>Crea tu Personaje</h2>

        <div class="saveBtn">
          <a href="#" class="btn"><i class="icon-chevron-left"></i> Regresar</a>
          <a href="#" id="js-saveCanvas" class="btn"><i class="icon-save"></i> Guardar</a> 
        </div>

        <div class="js-tabEngine itemSelector">
          <ul>
            <li><a href="#tab1">Cabeza</a></li>
            <li><a href="#tab2">Cuerpo</a></li>
            <li><a href="#tab3">Ojos</a></li>
            <li><a href="#tab4">Boca</a></li>
            <li><a href="#tab5">Accesorios</a></li>
          </ul>
          <div id="tab1" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['caras']);
                if(is_array($json['catalogos']['caras'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['caras'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/cabezas/".$value['url'],"caras",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab2" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['cuerpos']);
                if(is_array($json['catalogos']['cuerpos'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['cuerpos'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/cuerpos/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab3" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['ojos']);
                if(is_array($json['catalogos']['ojos'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['ojos'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/ojos/".$value['url'],"ojos",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab4" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['bocas']);
                if(is_array($json['catalogos']['bocas'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['bocas'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/bocas/".$value['url'],"bocas",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab5" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['accesorios']);
                if(is_array($json['catalogos']['accesorios'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['accesorios'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/accesorios/".$value['url'],"accesorios",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
        </div>
      </section>
    </div>

<a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/CaraWeb/create/"  class="js-lightbox">cam web</a>
<div id="wrapper">
<div style="display: none;" id="overlay"></div>
<div style="display: none;" id="popup">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif" />
</div>
</div>


<?php

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/slides.min.jquery.js'); 

//echo json_encode($json);
//Yii::app()->request->baseUrl
Yii::app()->getClientScript()->registerScript('registrar', '
  var avatar = '.CJSON::encode($json['avatar']).';
  var BaseUrl = "/php2/jcuervo"; 
  var accesorios=[]; var piezas=[];
  var angle, cara, cara_web, cuerpo, ojos, boca, currentLayer, currentSelected, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje, removeImage, scale, startScale, trans;
  caraWebInsert=true; currentSelected = null; scale = 1; scaleUpFactor= 1.05; trans = null;

  stagePersonaje = new Kinetic.Stage({container: "personajeCanvas",width: 258,height: 460});
  layerPersonaje = new Kinetic.Layer();
  stagePersonaje.getContainer().addEventListener("click", function(evt) { 
    if(currentSelected){
      currentSelected.setStroke(null);
      currentSelected.setStrokeWidth(0);
      currentSelected=null;
      layerPersonaje.draw(); 
    }
  });

  halfx = stagePersonaje.getWidth() / 2;
  halfy = stagePersonaje.getHeight() / 2;
  scale = 1;
  confCaraWeb = { x: halfx,y: halfy - 170,height: 100,width: 100,draggable: true,offset: [60, 60],startScale: scale,tipo: 2};
  confCara = { x: halfx,y: halfy - 170,height: 120,width: 120,draggable: true,offset: [60, 60],startScale: scale,tipo: 3};
  confCuerpo = {x: halfx,y: halfy + 50,height: 320,width: 200,draggable: true,offset: [100, 160],startScale: scale, tipo: 4};
  confOjos = {x: halfx,y: halfy - 160,height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale, tipo: 5};
  confBoca = {x: halfx,y: halfy - 140,height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale, tipo: 6};
  confAccesorio = {x: halfx,y: halfy - 100,height: 160,width: 160,draggable: true,offset: [80, 80],startScale: scale,tipo: 1};

  for(var k=0; k < avatar.avatarPiezas.length; k++){
    if(avatar.avatarPiezas[k].descripcion==="cara"){ 
      insertarPieza("cara",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 120,width: 120,draggable: true,offset: [60, 60],startScale: scale });
      caraWebInsert=false;
    }
    if(avatar.avatarPiezas[k].descripcion==="cuerpo")
    { 
      insertarPieza("cuerpo",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 320,width: 200,draggable: true,offset: [100, 160],startScale: scale });
    }
    if(avatar.avatarPiezas[k].descripcion=="ojos")
    { 
      insertarPieza("ojos",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale });
    }
    if(avatar.avatarPiezas[k].descripcion=="boca")
    { 
      insertarPieza("boca",avatar.avatarPiezas[k].AvatarImg,{ x: parseInt(avatar.avatarPiezas[k].posx), y: parseInt(avatar.avatarPiezas[k].posy), rotation: parseFloat(avatar.avatarPiezas[k].rotation), id: avatar.avatarPiezas[k].piezaid, tipo: avatar.avatarPiezas[k].tipo_pieza_id, height: 22,width: 95,draggable: true,offset: [47, 11],startScale: scale });
    }
  }
  if(avatar.cara_web.url && caraWebInsert){
    confCaraWeb.id=avatar.cara_web.url;
    insertarPieza("cara_web",avatar.cara_web.url,confCaraWeb);
  }
  for(var a in avatar.accesorios){
    insertarAccesorio(avatar.accesorios[a].accesorioImg, { x: parseInt(avatar.accesorios[a].posx), y: parseInt(avatar.accesorios[a].posy), rotation: parseFloat(avatar.accesorios[a].rotation), id: parseInt(avatar.accesorios[a].accesorios_id), tipo: 1,height: 160,width: 160,draggable: true,offset: [80, 80],startScale: scale});
  }
  
  stagePersonaje.add(layerPersonaje);

  $("#tab1 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confCara.id = pieza[0]; insertarPieza("cara",$(this).find("img").attr("src"),confCara); });
  $("#tab2 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confCuerpo.id = pieza[0]; insertarPieza("cuerpo",$(this).find("img").attr("src"),confCuerpo); });
  $("#tab5 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confAccesorio.id = pieza[0]; insertarAccesorio($(this).find("img").attr("src"),confAccesorio); });
  $("#tab4 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); confBoca.id = pieza[0]; insertarPieza("boca",$(this).find("img").attr("src"),confBoca); });
  $("#tab3 .itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-");  confOjos.id = pieza[0]; insertarPieza("ojos",$(this).find("img").attr("src"),confOjos); });

  function insertarPieza(obj,img,conf) {
    var aux;
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    if(obj==="cara"){ aux=obj; obj=cara; if(cara_web) { cara_web.remove(); removeCaraWeb(); } } 
    if(obj==="cara_web"){ aux=obj; obj=cara_web; conf.id=img; if(cara) cara.remove(); } 
    if(obj==="cuerpo"){ aux=obj; obj=cuerpo; }
    if(obj==="ojos"){ aux=obj; obj=ojos; }
    if(obj==="boca"){ aux=obj; obj=boca; }

    if(obj) {
      conf.x=obj.attrs.x;
      conf.y=obj.attrs.y;
      obj.remove();
    }
    var image = new Image();
    conf.image = image;
    image.onload = function(){
      conf.width=this.width;
      conf.height=this.height;
      obj = new Kinetic.Image(conf);
      layerPersonaje.add(obj);

      if(aux==="cara"){ cara=obj; cara.moveToBottom(); } 
      if(aux==="cuerpo"){ cuerpo=obj; cuerpo.moveToBottom(); } 
      if(aux==="ojos"){ ojos=obj; } 
      if(aux==="boca"){ boca=obj; } 
      if(aux==="cara_web"){ cara_web=obj; cara_web.moveToBottom(); }
        
      obj.on("mouseover", function() {
        if(!currentSelected){
          this.setStroke("980d2e");
          this.setStrokeWidth(1);
          return layerPersonaje.draw();
        }
      });

      obj.on("mouseout", function() {
        if(!currentSelected){
          this.setStroke(null);
          this.setStrokeWidth(0);
        }
        return layerPersonaje.draw();
      });

      obj.on("click", function() {
        if(currentSelected){
          currentSelected.setStroke(null);
          currentSelected.setStrokeWidth(0);
        }
        currentSelected = this;
        currentSelected.setStroke("980d2e");
        currentSelected.setStrokeWidth(1);
        if(currentSelected.attrs.tipo==1 || currentSelected.attrs.tipo==3 || currentSelected.attrs.tipo==4){
          currentSelected.moveToBottom();
        }
        layerPersonaje.draw();
      });
      
      obj.on("dragstart", function() {
        if(currentSelected){
          currentSelected.setStroke(null);
          currentSelected.setStrokeWidth(0);
        }
        currentSelected = this;
        currentSelected.setStroke("980d2e");
        currentSelected.setStrokeWidth(1);
        layerPersonaje.draw();
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
        if(currentSelected.attrs.tipo==2 || currentSelected.attrs.tipo==3 || currentSelected.attrs.tipo==4){
          currentSelected.moveToBottom();
        }
        console.log(this.getZIndex());
        trans = this.transitionTo({
          duration: 0.5,
          easing: "elastic-ease-out",
          scale: {
            x: this.attrs.startScale,
            y: this.attrs.startScale
          }
        });
        layerPersonaje.draw();
      });
      obj.fire("click");
      layerPersonaje.draw();
    };
    console.log(img);
    if(aux==="cara"){ image.src=BaseUrl+"/images/cabezas/"+img; } 
    if(aux==="cuerpo"){ image.src=BaseUrl+"/images/cuerpos/"+img; } 
    if(aux==="ojos"){ image.src=BaseUrl+"/images/ojos/"+img; } 
    if(aux==="boca"){ image.src=BaseUrl+"/images/bocas/"+img; } 
    if(aux==="cara_web"){ image.src=BaseUrl+"/AvatarCaras/"+img; }
 
    
  };

  function insertarAccesorio(img,conf) {
    var insertar=true;
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == conf.id) insertar=false;
    }
    if(insertar){
      imageAccesorio = new Image();
      conf.image = imageAccesorio;
      imageAccesorio.onload = function(){
        conf.width=this.width;
        conf.height=this.height;
        accesorio = new Kinetic.Image(conf);
        
        accesorio.on("mouseover", function() {
          if(!currentSelected){
            this.setStroke("980d2e");
            this.setStrokeWidth(1);
            return layerPersonaje.draw();
          }
        });

        accesorio.on("mouseout", function() {
          if(!currentSelected){
            this.setStroke(null);
            this.setStrokeWidth(0);
          }
          return layerPersonaje.draw();
        });

        accesorio.on("click", function() {
          if(currentSelected){
            currentSelected.setStroke(null);
            currentSelected.setStrokeWidth(0);
          }
          currentSelected = this;
          currentSelected.setStroke("980d2e");
          currentSelected.setStrokeWidth(1);
          if(currentSelected.attrs.tipo==3 || currentSelected.attrs.tipo==4){
            currentSelected.moveToBottom();
          }
          layerPersonaje.draw();
        });
        
        accesorio.on("dragstart", function() {
          if(currentSelected){
            currentSelected.setStroke(null);
            currentSelected.setStrokeWidth(0);
          }
          currentSelected = this;
          currentSelected.setStroke("980d2e");
          currentSelected.setStrokeWidth(1);
          layerPersonaje.draw();
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

        accesorio.on("dragend", function() {
          if(currentSelected.attrs.tipo==3 || currentSelected.attrs.tipo==4){
            currentSelected.moveToBottom();
          }
          trans = this.transitionTo({
            duration: 0.5,
            easing: "elastic-ease-out",
            scale: {
              x: this.attrs.startScale,
              y: this.attrs.startScale
            }
          });
          layerPersonaje.draw();
        });

        layerPersonaje.add(accesorio);
        accesorios.push(accesorio);
        accesorio.fire("click");

        layerPersonaje.draw();
      }
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      imageAccesorio.src=BaseUrl+"/images/accesorios/"+img;

      return true;
    }
    
    console.log("NO SE INSERTO");
    return false;
  };

  saveToImage = function() {
    var json = JSON.parse(layerPersonaje.toJSON()); 
    if(currentSelected){ currentSelected.setStroke(null); currentSelected.setStrokeWidth(0); currentSelected=null; layerPersonaje.draw(); }
    console.log(json.children);
    $("#overlay").css("display","block"); $("#popup").css("display","block"); $("#popup").fadeIn("slow");
    
    stagePersonaje.toDataURL({
      mimeType: "image/png",
      callback: function(dataUrl) {
        var avatarJson = { avatar: json.children, img: dataUrl };

        $.ajax({
          type: "POST",
          url: BaseUrl+"/index.php/avatars/UpdatePieza",
          data: avatarJson,
          success: function(url){
            window.location=url;
            $("#overlay").css("display","none"); 
            $("#popup").css("display","none"); 
          },
          error: function(data) { 
            console.log("hubo un error al guardar :(");
            $("#overlay").css("display","none"); 
            $("#popup").css("display","none"); 
          }
        });
      }
    });
    return false;
  };

  angle = 0.34906585;

  newangle = null;

  removeCaraWeb = function(){
    $.ajax({
      type: "POST",
      url: BaseUrl+"index.php/CaraWeb/delete",
      success: function(data){ },
      error: function(data) { 
        console.log("no eliminado");
      }
    });
  }

  removeImage = function(){
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == currentSelected.attrs.id){
        o = accesorios.indexOf(currentSelected)
        delete accesorios[o];
        accesorios.splice(o,o+1);
      }
    }
    if(currentSelected.attrs.tipo == 2){
      removeCaraWeb();
    }
    currentSelected.remove();
    layerPersonaje.draw();
    return false;
  }

  rotateLeft = function() {
    newangle = currentSelected.getRotation() - angle;
    console.log(newangle);
    console.log(angle);
    currentSelected.transitionTo({
      rotation: newangle,
      duration: 0.2,
      easing: "ease-out"
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
      duration: 0.2,
      easing: "ease-out"
    });
    layerPersonaje.draw();
    return false;
  };

  sendFront = function() {
    currentSelected.moveUp();
    layerPersonaje.draw();
    return false;
  };

  sendBack = function() {
    currentSelected.moveDown();
    layerPersonaje.draw();
    return false;
  };

  resetRotation = function() {
    currentSelected.transitionTo({
      rotation: 0,
      duration: 0.3
    });
    layerPersonaje.draw();
    return false;
  };

  $("#js-saveCanvas").on("click", saveToImage); 
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage);
  $("#js-resetRotation").on("click", resetRotation);
  $("#js-sendBack").on("click", sendBack);

  $(document).ready(function() {
    $(".js-tabEngine").easytabs({animate:!0,animationSpeed:150,tabActiveClass:"selected",updateHash:!1});
    $(".js-slides").slides({preload:!1,slideSpeed:450,generatePagination:!1,generateNextPrev:!1});
  });
  
',CClientScript::POS_END);

?>