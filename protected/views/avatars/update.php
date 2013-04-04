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
            <ul class="js-slides-1 bx-slides">
              <? 
                  //$n_slides=0;
                  if(is_array($json['catalogos']['caras'])){
                    //$n_slides=count($json['catalogos']['cuerpos'])/12;
                    //if(count($json['catalogos']['cuerpos'])%12>0) $n_slides++;
                    echo '<ul class="js-slides-1 bx-slides"';
                    foreach ($json['catalogos']['caras'] as $key => $value) {  
                      if($key%12==0) echo '<li>';
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                      if($key%12==0) echo '</li>';
                    }
                  }
                ?>   
            </ul>
          </div>
          <div id="tab2" class="memeThumbs">
                <? 
                  //$n_slides=0;
                  if(is_array($json['catalogos']['cuerpos'])){
                    //$n_slides=count($json['catalogos']['cuerpos'])/12;
                    //if(count($json['catalogos']['cuerpos'])%12>0) $n_slides++;
                    echo '<ul class="js-slides-2 bx-slides"';
                    foreach ($json['catalogos']['cuerpos'] as $key => $value) {  
                      if($key%12==0) echo '<li>';
                      echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'],'data-original'=>Yii::app()->request->baseUrl."/img/200x200.png",'class'=>'lazy')).'</div>'; 
                      if($key%12==0) echo '</li>';
                    }
                  }
                ?>   
          </div>
          <div id="tab3" class="memeThumbs">
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
            <div class="itemMeme"><img src="http://placehold.it/100x100.png"></div>
          </div>
          <div id="tab4" class="memeThumbs">
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
          </div>
          <div id="tab5" class="memeThumbs">
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
            <div class="itemMeme"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/200x200.png"></div>
          </div>
        </div>
      </section>
    </div>