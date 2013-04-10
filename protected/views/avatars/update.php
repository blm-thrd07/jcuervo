<div id="container">
      <section id="panelPersonaje">
        <h1>Nombre del Usuario</h1>
        <div id="personajeCanvas"></div>
        <div id="actions"><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-reset" class="btn"><i class="icon-refresh"></i></a><a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i></a></div>
      </section>
      <section id="panelContent">
        <h2>Crea tu Personje</h2>
        <div class="saveBtn"><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar       </a></div>
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


<?php

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/slides.min.jquery.js'); 

echo json_encode($json);
echo "<br><br>";


//pieza//accesorio//cara_web
Yii::app()->getClientScript()->registerScript('registrar', '
  var edit='.$json['edit'].';
  var avatar = '.CJSON::encode($json['avatar']).';
  var avatar_accesorios = '.CJSON::encode($json['avatar']['accesorios']).';
  var avatar_cara_web = '.CJSON::encode($json['avatar']['cara_web']).';
  var accesorios=[]; var piezas=[];
  var angle, cara, cara_web, cuerpo, ojos, boca, currentLayer, currentSelected, imageCabeza, imageCuerpo, imageOjos, imageBoca, init, insertCabeza, insertCuerpo, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje,removeImage;
  
  currentSelected = null;
  currentLayer = null;

  stagePersonaje = new Kinetic.Stage({
    container: "personajeCanvas",
    width: 258,
    height: 460,
  });

  layerPersonaje = new Kinetic.Layer();

  //se va a editar
  if(edit){
    for(var a in avatar_accesorios){
      insertarAccesorio(parseInt(avatar_accesorios[a].posx),parseInt(avatar_accesorios[a].posy),parseFloat(avatar_accesorios[a].rotation),parseInt(avatar_accesorios[a].accesorios_id),'.TiposPiezas::ACCESORIO.',avatar_accesorios[a].accesorioImg);
    }

    for(var k=0; k < avatar.avatarPiezas.length; k++){
      if(avatar.avatarPiezas[k].descripcion==="cara"){ 
        insertarPieza("cara",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseFloat(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion==="cuerpo")
      { 
        insertarPieza("cuerpo",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseFloat(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion=="ojos")
      { 
        insertarPieza("ojos",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseFloat(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion=="boca")
      { 
        insertarPieza("boca",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseFloat(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
    }
  
  }

  stagePersonaje.add(layerPersonaje);

//BOTONES

    console.log("ok go");
    $("#tab1 div.itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cara",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab2 div.itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cuerpo",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab5 div.itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarAccesorio(100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab4 div.itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("boca",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab3 div.itemMeme").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("ojos",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });

  function insertarPieza(obj,x,y,rotation,pieza_id,tipo_pieza_id,img) {
    var aux;
    if(obj==="cara"){ aux=obj; obj=cara; if(cara_web) cara_web.remove(); } 
    if(obj==="cara_web"){ aux=obj; obj=cara_web; if(cara) cara.remove(); } 
    if(obj==="cuerpo"){ aux=obj; obj=cuerpo; }
    if(obj==="ojos"){ aux=obj; obj=ojos; }
    if(obj==="boca"){ aux=obj; obj=boca; }

    if(obj) {
      x=obj.attrs.x;
      y=obj.attrs.y;
      obj.remove();
    }
    var image = new Image();
    obj = new Kinetic.Image({
      x: x,
      y: y,
      rotation: rotation,
      height: 200,
      width: 200,
      image: image,
      draggable: true,
      offset: [100, 100],
      tipo: tipo_pieza_id,
      id: pieza_id
    });
    layerPersonaje.add(obj);
    img=img.replace(/^.*\/(?=[^\/]*$)/, "");
    console.log(img);
    if(aux==="cara"){ cara=obj; cara.moveToBottom(); image.src="'.Yii::app()->request->baseUrl.'/images/cabezas/"+img; } 
    if(aux==="cuerpo"){ cuerpo=obj; cuerpo.moveToBottom(); image.src="'.Yii::app()->request->baseUrl.'/images/cuerpos/"+img; } 
    if(aux==="ojos"){ ojos=obj; image.src="'.Yii::app()->request->baseUrl.'/images/ojos/"+img; } 
    if(aux==="boca"){ boca=obj; image.src="'.Yii::app()->request->baseUrl.'/images/bocas/"+img; } 
    if(aux==="cara_web"){ /*cara=obj; image.src = "data:image/png;base64," + img + "";*/ }
      
    obj.on("mouseover", function() {
      this.setStroke("980d2e");
      this.setStrokeWidth(1);
      return layerPersonaje.draw();
    });

    obj.on("mouseout", function() {
      this.setStroke(null);
      this.setStrokeWidth(0);
      return layerPersonaje.draw();
    });

    obj.on("click", function() {
      currentSelected = this;
    });

    layerPersonaje.draw();
  };

  function insertarAccesorio(x,y,rotation,pieza_id,tipo_pieza_id,img) {
    var insertar=true;
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == pieza_id) insertar=false;
    }
    if(insertar){
      imageAccesorio = new Image();
      accesorio = new Kinetic.Image({
        x: x,
        y: y,
        rotation: rotation,
        height: 200,
        width: 200,
        image: imageAccesorio,
        draggable: true,
        offset: [100, 100],
        tipo: tipo_pieza_id,
        id: pieza_id
      });
      console.log(img);
      img=img.replace(/^.*\/(?=[^\/]*$)/, "");
      console.log(img);
      imageAccesorio.src="'.Yii::app()->request->baseUrl.'/images/accesorios/"+img;
      accesorio.on("mouseover", function() {
        this.setStroke("980d2e");
        this.setStrokeWidth(1);
        return layerPersonaje.draw();
      });

      accesorio.on("mouseout", function() {
        this.setStroke(null);
        this.setStrokeWidth(0);
        return layerPersonaje.draw();
      });

      accesorio.on("click", function() {
        currentSelected = this;
      });
      console.log("ACCESORIO: id: "+pieza_id+"tipo: "+tipo_pieza_id);
      layerPersonaje.add(accesorio);
      accesorios.push(accesorio);
      
      return setTimeout((function() {
        layerPersonaje.draw();
        return console.log("ok redraw!");
      }), 300);

      return true;
    }
    
    console.log("NO SE INSERTO");
    return false;
  };

  saveToImage = function() {
   var json = JSON.parse(layerPersonaje.toJSON()); 
    console.log(json.children);
    $("#overlay").css("display","block"); 
    $("#popup").css("display","block"); 
    $("#popup").fadeIn("slow");
    
    stagePersonaje.toDataURL({
      mimeType: "image/png",
      callback: function(dataUrl) {
        //alert(dataUrl);
        var avatarJson = { avatar: json.children, edit: edit, img: dataUrl };

        $.ajax({
          type: "POST",
          url: "'.CController::CreateUrl("avatars/UpdatePieza").'",
          data: avatarJson,
          success: function(url){
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
    return false;
  };

  listenerStat = function() {
    var json = JSON.parse(layerPersonaje.toJSON()); 
    console.log(json.children);    
    return false;
  };

  angle = 0.174532925;

  newangle = null;

  removeImage = function(){
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == currentSelected.attrs.id){
        o = accesorios.indexOf(currentSelected)
        delete accesorios[o];
        accesorios.splice(o,o+1);
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
    currentSelected.moveUp();
    currentLayer.draw();
    console.log("front");
    return false;
  };

  sendBack = function() {
    currentSelected.moveDown();
    layerPersonaje.draw();
    console.log("back");
    return false;
  };

  $(".saveBtn").on("click", listenerStat);
  $("#js-listenerStat").on("click", saveToImage); 
  $("#js-rotateLeft").on("click", rotateLeft);
  $("#js-rotateRight").on("click", rotateRight);
  $("#js-sendFront").on("click", sendFront);
  $("#js-removeElement").on("click", removeImage); //
  $("#js-sendBack").on("click", sendBack);

  $(document).ready(function() {
    console.log("ready");
    $(".js-tabEngine").easytabs({animate:!0,animationSpeed:150,tabActiveClass:"selected",updateHash:!1});
    $(".js-slides").slides({preload:!1,slideSpeed:450,generatePagination:!1,generateNextPrev:!1});
    $(#personajeCanvas").trigger("mouseenter");
    setTimeout(function(){ layerPersonaje.draw(); console.log("cargado"); },1500);

  });

  
',CClientScript::POS_END);

?>