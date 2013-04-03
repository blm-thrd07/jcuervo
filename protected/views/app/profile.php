 <section id="panelPersonaje">
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div><img src="http://ima.gs/transparent/NONE/A2A2A2/258x460.png"></div>
        <div id="actions"><a href="#" class="btn"><i class="icon-edit"></i> Editar</a></div>
</section>
<section id="panelContent">
     <h2>Mis Memes</h2>
        <div class="tabs"><a id="dest" class="menu" href="#" >Destacados</a><a id="mismemes" href="#" class="selectedTab menu">Mis Memes</a><a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        <div class="memeThumbs">
          <div class="itemMeme"><a href="#c" class="itemAction"><i class="icon-plus-sign"></i>Crea Nuevo Meme</a></div>
          <div class="itemMeme"><a href="#a"><img src="http://placehold.it/640x480.png"></a></div>
          <div class="itemMeme"><a href="#a"><img src="http://placehold.it/640x480.png"></a></div>
          <div class="itemMeme"><a href="#a"><img src="http://placehold.it/640x480.png"></a></div>
          <div class="itemMeme"><a href="#a"><img src="http://placehold.it/640x480.png"></a></div>
          <div class="itemMeme"><a href="#a"><img src="http://placehold.it/640x480.png"></a></div>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
</section>


 <a href="<? echo $logoutUrl ?>"> LOGOUT</a>
 <section id="crearPersonaje">
      <h1>Crea tu personaje</h1>
      <h2><?echo $json['usuario']['nombre']; ?></h2>
      <div class="canvas">
        <div id="personajeCanvas"></div>
      </div>
      <div class="controllers"><a href="#" id="remove" class="btn">remove</i></a><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-listenerStat" class="btn">JSON log</a><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a></div>
      <div class="tabEngine itemSelector">
        <ul>
          <li><a href="#tab1">Cabeza</a></li>
          <li><a href="#tab2">Cuerpo</a></li>
          <li><a href="#tab3">Accesorios</a></li>
          <li><a href="#tab4">Boca</a></li>
          <li><a href="#tab5">Tangas</a></li>
          <li><a href="#tab6">Otros</a></li>
        </ul>
        <div id="tab1">
          <? 
          if(is_array($json['catalogos']['caras'])){
           foreach ($json['catalogos']['caras'] as $key => $value) {
              echo   '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/200x200.png","cabeza",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
            }
          }
         ?>
        </div>
        <div id="tab2">
        <?
          if(is_array($json['catalogos']['cuerpos'])){
            foreach ($json['catalogos']['cuerpos'] as $key => $value) {
              echo   '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cabeza",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
            }
          }
        ?>
        </div>
        <div id="tab3">
          <?
               if(is_array($json['catalogos']['accesorios'])){
                foreach ($json['catalogos']['accesorios'] as $key => $value) {
                echo '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"accesorio",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                }
              }
          ?>
        </div>
        <div id="tab4">
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab5">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab6">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
      </div>
    </section>


    <section>
            <h1>Mi Avatar.</h1>
            <? echo "<img src='https://apps.t2omedia.com.mx/php2/jcuervo/Avatar/".$json['avatar']['avatarImg']."' />"; ?>

    </section>
    <section>
      <h1>Avatars de mis amigos</h1>
      <?
      
if(is_array($json['avatar']['amigosAvatars'])){
                foreach ($json['avatar']['amigosAvatars'] as $key => $value) {
                echo '<div><h2>'.$value['nombre'].'</h2>'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture',$value['nombre'],array('id'=>$value['idFb'])).'  '.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$value['avatar_img'],$value['nombre'],array('id'=>$value['idFb'])).'</div>'; 
                }
              }

              

      ?>
    </section>


<section>
<h1>Mis Comics</h1>
   <? 
   if(is_array($json['avatar']['comics'])){
                foreach ($json['avatar']['comics'] as $key => $value) {
                   echo '<div>'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen'],$value['imagen'],array('id'=>'comic')).'</div>'; 
                }
   }
      ?>

</section>

<button id="snapshot" name="url_cara_web<?php echo Yii::app()->session["usuario_id"]; ?>">foto</button> 
<img src="" id='cropped_img' alt="" />

<?php
//print_r($json);
//echo count($json);
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
    width: 640,
    height: 480,
  });

  layerPersonaje = new Kinetic.Layer();

  //se va a editar
  if(edit){
    for(var a in avatar_accesorios){
      insertarAccesorio(parseInt(avatar_accesorios[a].posx),parseInt(avatar_accesorios[a].posy),parseInt(avatar_accesorios[a].accesorios_id),'.TiposPiezas::ACCESORIO.',avatar_accesorios[a].accesorioImg);
    }

    for(var k=0; k < avatar.avatarPiezas.length; k++){
      if(avatar.avatarPiezas[k].descripcion==="cara"){ 
        insertarPieza("cara",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion==="cuerpo")
      { 
        insertarPieza("cuerpo",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion=="ojos")
      { 
        insertarPieza("ojos",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
      if(avatar.avatarPiezas[k].descripcion=="boca")
      { 
        insertarPieza("boca",parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),avatar.avatarPiezas[k].piezaid,avatar.avatarPiezas[k].tipo_pieza_id,avatar.avatarPiezas[k].AvatarImg);
      }
    }
  
  }

  stagePersonaje.add(layerPersonaje);

//BOTONES

  init = function() {
    console.log("ok go");
    $("#tab1 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cara",100,100,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab2 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cuerpo",100,100,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab3 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarAccesorio(100,100,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab4 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("ojos",100,100,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab5 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("boca",100,100,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#snapshot").html5WebCam({
                oncrop: function(cropped_url) { 
                  $("#cropped_img").attr("src", cropped_url); 
                  var url = $("#snapshot").find("a").attr("name");
                  insertarPieza("cara_web",100,100,url,'.TiposPiezas::CARA_WEB.',$("#cropped_img").attr("src"));
                },
            });
    $("#camara").on("click", function(e){ var url = $(this).find("a").attr("name"); insertarPieza("cara_web",100,100,url,'.TiposPiezas::CARA_WEB.',imagen) });
    $("#js-toImage").on("click", saveToImage);
    $("#js-listenerStat").on("click", listenerStat);
    $("#js-rotateLeft").on("click", rotateLeft);
    $("#js-rotateRight").on("click", rotateRight);
    $("#js-sendFront").on("click", sendFront);
    $("#remove").on("click", removeImage);
    return $("#js-sendBack").on("click", sendBack);
  };

  function insertarPieza(obj,x,y,pieza_id,tipo_pieza_id,img) {
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

  function insertarAccesorio(x,y,pieza_id,tipo_pieza_id,img) {
    var insertar=true;
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == pieza_id) insertar=false;
    }
    if(insertar){
      imageAccesorio = new Image();
      accesorio = new Kinetic.Image({
        x: x,
        y: y,
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
    stagePersonaje.toDataURL({
      callback: function(dataUrl) {
        alert(dataUrl);
        //return window.open(dataUrl);
      }
    });
    /*stagePersonaje.toImage({
      callback: function(dataUrl) {
        alert(dataUrl);
        //return window.open(dataUrl);
      }
    });*/
    return false;
  };

  listenerStat = function() {
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

  angle = 0.174532925;

  newangle = null;

  removeImage = function(){
    //layerPersonaje.remove();
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == currentSelected.attrs.id) accesorios.setVisible(false);
        //accesorios.remove(currentSelected);
    }
    currentSelected.remove();
    //currentSelected.setVisible(false);
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

  $(document).on("ready", init);
',CClientScript::POS_READY);

?>
