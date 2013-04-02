 <section id="panelPersonaje">
        <h1>Nombre del Usuario</h1>
        <div><img src="http://ima.gs/transparent/NONE/A2A2A2/258x460.png"></div>
        <div id="actions"><a href="#" class="btn"><i class="icon-edit"></i> Editar</a></div>
</section>
      <section id="panelContent">
        <h2>Mis Memes</h2>
        <div class="tabs"><a href="destacados.html">Destacados</a><a id="mismemes" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/mismemes" class="selectedTab">Mis Memes</a><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/misamigos">De mis amigos</a><a  id="categoria" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/categoria">Por categoría</a></div>
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
<?
/*
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

?>
*/
?>
<?php
//print_r($json);

//echo count($json);
echo json_encode($json);
echo "<br><br>";
//echo json_encode($avatar);
//print_r($json['avatar']['amigosAvatars']);

echo CHtml::link("cara_web", "#", array('class'=>"insertar",'name'=>"url_cara_web"))." "; 

//pieza//accesorio//cara_web
Yii::app()->getClientScript()->registerScript('registrar', '
  var edit='.$json['edit'].';
  var avatar = '.CJSON::encode($json['avatar']).';
  var accesorios=[]; var piezas=[];
  var angle, cabeza, cuerpo, ojos, boca, currentLayer, currentSelected, imageCabeza, imageCuerpo, init, insertCabeza, insertCuerpo, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje;

  currentSelected = null;
  currentLayer = null;

  stagePersonaje = new Kinetic.Stage({
    container: "personajeCanvas",
    width: 640,
    height: 480,
    dragOnTop: false,
  });

  layerPersonaje = new Kinetic.Layer({
    dragOnTop: false,
  });

  imageCabeza = new Image();
  imageCuerpo = new Image();
  imageOjos = new Image();
  imageBoca = new Image();

  //se va a editar
  if(edit){
    for(var k=0; k < avatar.avatarPiezas.length; k++){
      if(avatar.avatarPiezas[k].descripcion=="cara"){
        insertCabeza(parseInt(avatar.avatarPiezas[k].posx),parseInt(avatar.avatarPiezas[k].posy),avatar.avatarPiezas[k].piezaid,tipo_pieza_id);
      }

      if(avatar.avatarPiezas[k].descripcion=="cuerpo")
      {
        
      }
      if(avatar.avatarPiezas[k].descripcion=="ojos")
      {
      
      }
      if(avatar.avatarPiezas[k].descripcion=="boca")
      {
      
      }
    }
  
  }

  stagePersonaje.add(layerPersonaje);

//BOTONES

  init = function() {
    console.log("ok go");
    $("#tab1 div").on("click", insertCabeza);
    $("#tab2 div").on("click", insertCuerpo);
    $("#tab3 div").on("click", insertAccesorio);
    $("#tab4 div").on("click", insertOjos);
    $("#tab5 div").on("click", insertBoca);
    $("#js-toImage").on("click", saveToImage);
    $("#js-listenerStat").on("click", listenerStat);
    $("#js-rotateLeft").on("click", rotateLeft);
    $("#js-rotateRight").on("click", rotateRight);
    $("#js-sendFront").on("click", sendFront);
    $("#remove").on("click", removeImage);
    return $("#js-sendBack").on("click", sendBack);
  };

  insertCabeza = function(x,y,pieza_id,tipo_pieza_id) {
    alert("x: " +x +" y: "+ y+ " pieza_id: "+ pieza_id+ " tipo_pieza_id: "+tipo_pieza_id);
    //x = typeof x !== "undefined" ? x : 100;
    //y = typeof x !== "undefined" ? y : 100;

    pieza = $(this).find("img").attr("id").split("-");
    var insertar=true;
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == pieza[0])
        insertar=false; // !=pieza[0]);
    }
    if(insertar){
      imageAccesorio = new Image();
      accesorio = new Kinetic.Image({
        x: 400,
        y: 100,
        height: 200,
        width: 200,
        image: imageCabeza,
        draggable: true,
        offset: [100, 100],
        tipo: pieza[1],
        id: pieza[0]
      });

      var imgUrl;
      imgUrl = $(this).find("img").attr("src");
      
      imageAccesorio.src = imgUrl;
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
      console.log(imgUrl);
      console.log("ACCESORIO: id: "+pieza[0]+"tipo: "+pieza[1]);
      layerPersonaje.add(accesorio);
      accesorios.push(accesorio);
      layerPersonaje.draw();
      return true;
    }
    return false;
  };

  insertCuerpo = function() {
    var imgUrl = $(this).find("img").attr("src");
    console.log(imgUrl);
    pieza = $(this).find("img").attr("id").split("-");
    cuerpo.attrs.id=pieza[0];
    cuerpo.attrs.tipo=pieza[1];
    console.log("CUERPO id: "+pieza[0]+"tipo: "+pieza[1]);
    cuerpo.setVisible(true);
    imageCuerpo.src = imgUrl;
    return layerPersonaje.draw();
  };

  insertOjos = function() {
    var imgUrl = $(this).find("img").attr("src");
    pieza = $(this).find("img").attr("id").split("-");
    ojos.attrs.id=pieza[0];
    ojos.attrs.tipo=pieza[1];
    ojos.setVisible(true);
    console.log("OJOS id: "+pieza[0]+"tipo: "+pieza[1]);
    imageOjos.src = imgUrl;
    return layerPersonaje.draw();
  };

  insertBoca = function() {
    var imgUrl = $(this).find("img").attr("src");
    pieza = $(this).find("img").attr("id").split("-");
    boca.attrs.id=pieza[0];
    boca.attrs.tipo=pieza[1];
    boca.setVisible(true);
    console.log("BOCA id: "+pieza[0]+"tipo: "+pieza[1]);
    imageBoca.src = imgUrl;
    return layerPersonaje.draw();
  };

  insertAccesorio = function() {
    pieza = $(this).find("img").attr("id").split("-");
    var insertar=true;
    for(i=0;i<accesorios.length;i++){
      if(accesorios[i].attrs.id == pieza[0])
        insertar=false; // !=pieza[0]);
    }
    if(insertar){
      imageAccesorio = new Image();
      accesorio = new Kinetic.Image({
        x: 400,
        y: 100,
        height: 200,
        width: 200,
        image: imageAccesorio,
        draggable: true,
        offset: [100, 100],
        tipo: pieza[1],
        id: pieza[0]
      });

      var imgUrl;
      imgUrl = $(this).find("img").attr("src");
      
      imageAccesorio.src = imgUrl;
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
      console.log(imgUrl);
      console.log("ACCESORIO: id: "+pieza[0]+"tipo: "+pieza[1]);
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
          url: "http://localhost/jcuervo/index.php/avatars/UpdatePieza",
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

$("#mismemes").click(function(){
$.ajax({
          type: "GET",
          url: "http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/mismemes",
          success: function(data){
              $("#panelContent").html(data);
          }
        });

 return false;

});


  $(document).on("ready", init);
',CClientScript::POS_READY);

?>
