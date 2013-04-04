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
              <? 
              
                  //$n_slides=0;
                $bandera=false;
                  if(is_array($json['catalogos']['caras'])){
                    //$n_slides=count($json['catalogos']['caras'])/12;
                    //if(count($json['catalogos']['cuerpos'])%12>0) $n_slides++;
                    echo '<ul class="js-slides-1 bx-slides">';
                    foreach ($json['catalogos']['caras'] as $key => $value) {  
                      if($key%12==0) {
                        if($bandera) echo '</li>'; else $bandera=true;
                        echo "<li>";
                      }
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"caras",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                    }
                    echo "</li></ul>";
                  }
                  
                ?>   
          </div>
          <div id="tab2" class="memeThumbs">
                <? 
                
                  if(is_array($json['catalogos']['cuerpos'])){
                    echo '<ul class="js-slides-2 bx-slides"';
                    foreach ($json['catalogos']['cuerpos'] as $key => $value) {  
                      if($key%12==0) echo '<li>';
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                      if($key%12==0) echo '</li>';
                    }
                    echo "</ul>";
                  }
                  
                ?>   
          </div>
          <div id="tab3" class="memeThumbs">
            <? 
            
                  if(is_array($json['catalogos']['bocas'])){
                    echo '<ul class="js-slides-3 bx-slides"';
                    foreach ($json['catalogos']['bocas'] as $key => $value) {  
                      if($key%12==0) echo '<li>';
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                      if($key%12==0) echo '</li>';
                    }
                    echo "</ul>";
                  }
                  
                ?>   
          </div>
          <div id="tab4" class="memeThumbs">
           <? 
           
                  if(is_array($json['catalogos']['ojos'])){
                    echo '<ul class="js-slides-4 bx-slides"';
                    foreach ($json['catalogos']['ojos'] as $key => $value) {  
                      if($key%12==0) echo '<li>';
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                      if($key%12==0) echo '</li>';
                    }
                    echo "</ul>";
                  }
                  
                ?>   
          <div id="tab5" class="memeThumbs">
            <? 
                  if(is_array($json['catalogos']['accesorios'])){
                    echo '<ul class="js-slides-5 bx-slides"';
                    foreach ($json['catalogos']['accesorios'] as $key => $value) {  
                      if($key%12==0) echo '<li>';
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                      if($key%12==0) echo '</li>';
                    }
                    echo "</ul>";
                  }
                ?>   
          </div>
        </div>
      </section>
    </div>


<?php

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/html5-webcam-build.js'); 
$cs->registerCssFile($baseUrl.'/css/html5-webcam.css');

echo json_encode($json);
echo "<br><br>";

echo CHtml::link("cara_web", "#", array('class'=>"btn",'name'=>"url_cara_web_".Yii::app()->session['usuario_id']))." "; 

//pieza//accesorio//cara_web
Yii::app()->getClientScript()->registerScript('registrar', '
  var edit='.$json['edit'].';
  var avatar = '.CJSON::encode($json['avatar']).';
  var avatar_accesorios = '.CJSON::encode($json['avatar']['accesorios']).';
  var avatar_cara_web = '.CJSON::encode($json['avatar']['cara_web']).';
  var accesorios=[]; var piezas=[];
  var angle, cara, cara_web, cuerpo, ojos, boca, currentLayer, currentSelected, imageCabeza, imageCuerpo, imageOjos, imageBoca, init, insertCabeza, insertCuerpo, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje;
  
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
        insertarPieza("cara",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseInt(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion==="cuerpo")
      { 
        insertarPieza("cuerpo",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseInt(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion=="ojos")
      { 
        insertarPieza("ojos",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseInt(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion=="boca")
      { 
        insertarPieza("boca",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),parseInt(avatar.avatarPiezas[k].rotation),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
    }
  
  }

  stagePersonaje.add(layerPersonaje);

//BOTONES

  init = function() {
    console.log("ok go");
    $("#tab1 div.ul").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cara",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab2 div.ul").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cuerpo",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab5 div.ul").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarAccesorio(100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab4 div.ul").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("ojos",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab3 div.ul").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("boca",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#snapshot").html5WebCam({
                oncrop: function(cropped_url) { 
                  $("#cropped_img").attr("src", cropped_url); 
                  var url = $("#snapshot").find("a").attr("name");
                  insertarPieza("cara_web",100,100,url,'.TiposPiezas::CARA_WEB.',$("#cropped_img").attr("src"));
                },
            });
    $("#camara").on("click", function(e){ var url = $(this).find("a").attr("name"); insertarPieza("cara_web",100,100,url,'.TiposPiezas::CARA_WEB.',imagen) });
    $(".saveBtn").on("click", listenerStat);
    $("#js-listenerStat").on("click", saveToImage); 
    $("#js-rotateLeft").on("click", rotateLeft);
    $("#js-rotateRight").on("click", rotateRight);
    $("#js-sendFront").on("click", sendFront);
    $("#remove").on("click", removeImage);
    return $("#js-sendBack").on("click", sendBack);
  };

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
    if(aux!=="cara_web")
      image.src="'.Yii::app()->request->baseUrl.'/img/"+img;
    else{
      alert(img); 
      image.src = "data:image/png;base64," + img + "";
      //image.src=img; 
    }
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
      return currentLayer = layerPersonaje;
    });

    if(aux==="cara"){ cara=obj; } 
    if(aux==="cuerpo"){ cuerpo=obj; } 
    if(aux==="ojos"){ ojos=obj; } 
    if(aux==="boca"){ boca=obj; } 

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
      imageAccesorio.src="'.Yii::app()->request->baseUrl.'/img/"+img;
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
        return currentLayer = layerPersonaje;
      });
      console.log("ACCESORIO: id: "+pieza_id+"tipo: "+tipo_pieza_id);
      layerPersonaje.add(accesorio);
      accesorios.push(accesorio);
      layerPersonaje.draw();
      return true;
    }
    
    console.log("NO SE INSERTO");
    return false;
  };

  saveToImage = function() {
   var json = JSON.parse(layerPersonaje.toJSON()); 
    console.log(json.children);
    
    stagePersonaje.toDataURL({
      mimeType: "image/png",
      callback: function(dataUrl) {
        //alert(dataUrl);
        var avatarJson = { avatar: json.children, edit: edit, img: dataUrl };

        $.ajax({
          type: "POST",
          url: "'.CController::CreateUrl("avatars/UpdatePieza").'",
          data: avatarJson,
          success: function(data){
              //alert(data);
          }
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
    //layerPersonaje.remove();
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == currentSelected.attrs.id){
        o = accesorios.indexOf(currentSelected)
        delete accesorios[o];
        accesorios.splice(o,o+1);
      }
        //accesorios.remove(currentSelected);
    }
    currentSelected.remove();
    currentLayer.draw();
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
    currentLayer.draw();
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
    currentLayer.draw();
    return false;
  };

  sendFront = function() {
    currentSelected.moveToTop();
    currentLayer.draw();
    console.log("front");
    return false;
  };

  sendBack = function() {
    currentSelected.moveToBottom();
    currentLayer.draw();
    console.log("back");
    return false;
  };


  $(function() {
    $(".lazy").lazyload({
      effect: "fadeIn"
    });
    return setTimeout((function() {
      $(window).trigger("scroll");
      console.log(":)");
      return layerPersonaje.draw();
    }), 100);
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