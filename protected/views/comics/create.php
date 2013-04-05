<div id="container">
      <section id="panelPersonaje">
        <h1>Nombre del Usuario</h1>
        <div id="personajeCanvas"></div>
        <div id="actions"><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-reset" class="btn"><i class="icon-refresh"></i></a><a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i></a></div>
      </section>
      <section id="panelContent">
        <h2>Crea tu Comic</h2>
        <div class="saveBtn"><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar             </a></div>
        <div class="js-tabEngine itemSelector">
          <ul>
            <li><a href="#tab1">Fondos</a></li>
            <li><a href="#tab2">Objetos</a></li>
            <li><a href="#tab3">Amigos</a></li>
          </ul>
          <div id="tab1" class="memeThumbs">
              <? /*
                $bandera=false;
                    echo '<ul class="js-slides-1 bx-slides">';
                    foreach ($backgrounds as $key => $value) {  
                      if($key%12==0) {
                        if($bandera) echo '</li>'; else $bandera=true;
                        echo "<li>";
                      }
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/placeholder.png","caras",array('id'=>$value['id_background'],'data-original'=>Yii::app()->request->baseUrl."/img/".$value['url'],'class'=>'lazy')).'</div>'; 
                    }
                    echo "</li></ul>";
                  }
                  */
                ?>   
          </div>
          <div id="tab2" class="memeThumbs">
                <? /*
                $bandera=false;
                    echo '<ul class="js-slides-1 bx-slides">';
                    foreach ($objetos as $key => $value) {  
                      if($key%12==0) {
                        if($bandera) echo '</li>'; else $bandera=true;
                        echo "<li>";
                      }
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/placeholder.png","caras",array('id'=>$value['id'],'data-original'=>Yii::app()->request->baseUrl."/img/".$value['url'],'class'=>'lazy')).'</div>'; 
                    }
                    echo "</li></ul>";
                  }
                  */
                ?>    
          </div>
          <div id="tab3" class="memeThumbs">
            <? 
                echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/placeholder.png","caras",array('id'=>1,'data-original'=>Yii::app()->request->baseUrl."/Comics/comic1.jpg",'class'=>'lazy')).'</div>'; 
            /*
                $bandera=false;
                    echo '<ul class="js-slides-1 bx-slides">';
                    foreach ($backgrounds as $key => $value) {  
                      if($key%12==0) {
                        if($bandera) echo '</li>'; else $bandera=true;
                        echo "<li>";
                      }
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/placeholder.png","caras",array('id'=>$value['id_background'],'data-original'=>Yii::app()->request->baseUrl."/img/".$value['url'],'class'=>'lazy')).'</div>'; 
                    }
                    echo "</li></ul>";
                  }
                  */
                ?>   
          </div>
        </div>
      </section>
    </div>




<?php echo $this->renderPartial('_form', array('model'=>$model)); 

Yii::app()->getClientScript()->registerScript('registrar', '
  var angle,cuerpos, amigos, currentLayer, currentSelected, imageCabeza, imageCuerpo, imageOjos, imageBoca, init, insertCabeza, insertCuerpo, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje;
  
  currentSelected = null;

  stagePersonaje = new Kinetic.Stage({
    container: "personajeCanvas",
    width: 640,
    height: 480,
  });
  
  layerFondo = new Kinetic.Layer();
  layerPersonaje = new Kinetic.Layer();
  stagePersonaje.add(layerFondo);
  stagePersonaje.add(layerPersonaje);

//BOTONES

  init = function() {
    console.log("ok go");
    $("#tab1 div").on("click", function(e){ var pieza = $(this).find("img").attr("id"); insertar("amigo",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab2 div").on("click", function(e){ var pieza = $(this).find("img").attr("id"); insertar("cuerpo",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab3 div").on("click", function(e){ var pieza = $(this).find("img").attr("id"); insertarFondo(100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#js-toImage").on("click", saveToImage);
    $("#js-listenerStat").on("click", listenerStat);
    $("#js-rotateLeft").on("click", rotateLeft);
    $("#js-rotateRight").on("click", rotateRight);
    $("#js-sendFront").on("click", sendFront);
    $("#remove").on("click", removeImage);
    $("#js-sendBack").on("click", sendBack);
    return $(".js-tabEngine a").on("click", function() {
      console.log("you hace clicked a tab btn");
      return setTimeout((function() {
        $(window).trigger("scroll");
        return console.log("ok tab ok");
      }), 600);
    });
  };

  function insertar(obj,pieza_id,img) {
  	var aux;
  	if(obj==="cuerpo"){ aux=obj; obj=cuerpos; }
    if(obj==="amigo"){ aux=obj; obj=amigos; }
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

  function insertarFondo(obj,img) {
  	
  	imageFondo = new Image();
    fondo = new Kinetic.Image({
        x: 0,
        y: 0,
        rotation: rotation,
        height: 640,
        width: 480,
        image: imageBackground,
        draggable: true,
        offset: [100, 100],
        tipo: tipo_pieza_id,
        id: pieza_id
      });
	imageBackground = new Image();
	imageBackground.src="'.Yii::app()->request->baseUrl.'/Comics/comic1.jpg";
	layerFondo.add(fondo);
	layerPersonaje.moveToTop();

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

  $(document).on("ready", init);
',CClientScript::POS_READY);

?>