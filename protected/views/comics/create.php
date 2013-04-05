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
              <? 
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
                  
                ?>   
          </div>
          <div id="tab2" class="memeThumbs">
                <? 
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
                  
                ?>    
          </div>
          <div id="tab3" class="memeThumbs">
            <? 
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
                  
                ?>   
          </div>
        </div>
      </section>
    </div>




<?php echo $this->renderPartial('_form', array('model'=>$model)); 

Yii::app()->getClientScript()->registerScript('registrar', '
  var angle, cara, cara_web, cuerpo, ojos, boca, currentLayer, currentSelected, imageCabeza, imageCuerpo, imageOjos, imageBoca, init, insertCabeza, insertCuerpo, layerPersonaje, listenerStat, newangle, rotateLeft, rotateRight, saveToImage, sendBack, sendFront, stagePersonaje;
  
  currentSelected = null;

  stagePersonaje = new Kinetic.Stage({
    container: "personajeCanvas",
    width: 640,
    height: 480,
  });

  layerPersonaje = new Kinetic.Layer();
  stagePersonaje.add(layerPersonaje);

//BOTONES

  init = function() {
    console.log("ok go");
    $("#tab1 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cara",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab2 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("cuerpo",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab3 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarAccesorio(100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab4 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("ojos",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#tab5 div").on("click", function(e){ var pieza = $(this).find("img").attr("id").split("-"); insertarPieza("boca",100,100,0,pieza[0],pieza[1],$(this).find("img").attr("src")) });
    $("#js-toImage").on("click", saveToImage);
    $("#js-listenerStat").on("click", listenerStat);
    $("#js-rotateLeft").on("click", rotateLeft);
    $("#js-rotateRight").on("click", rotateRight);
    $("#js-sendFront").on("click", sendFront);
    $("#remove").on("click", removeImage);
    return $("#js-sendBack").on("click", sendBack);
  };

  function insertarPieza(obj,x,y,rotation,pieza_id,tipo_pieza_id,img) {
    
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

    layerPersonaje.draw();
  };

  saveToImage = function() {
    stagePersonaje.toDataURL({
      callback: function(dataUrl) {
        alert(dataUrl);
        //return window.open(dataUrl);
      }
    });
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