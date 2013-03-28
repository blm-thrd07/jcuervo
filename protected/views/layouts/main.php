<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    
  </head>
  <body>

      <?php echo $content; ?>

    <section id="crearPersonaje">
      <h1>Crea tu personaje</h1>
      <h2>Nombre del Usuario</h2>
      <div class="canvas">
        <div id="personajeCanvas"></div>
      </div>
      <div class="controllers"><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-listenerStat" class="btn">JSON log</a><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a></div>
      <div class="tabEngine itemSelector">
        <ul>
          <li><a href="#tab1">Cabeza</a></li>
          <li><a href="#tab2">Cuerpo</a></li>
          <li><a href="#tab3">Ojos</a></li>
          <li><a href="#tab4">Boca</a></li>
          <li><a href="#tab5">Accesorios</a></li>
          <li><a href="#tab6">Otros</a></li>
        </ul>
        <div id="tab1">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab2">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab3">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab4">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab5">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab6">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
      </div>
    </section>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kinetic-v4.3.3.min.js"></script>
    <!--script(src='js/kinetic-test.js')-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hashchange.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
    
  </body>
</html>