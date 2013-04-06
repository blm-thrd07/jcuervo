<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
  </head>

  <body class="lb">
    <div id="detalle">

      <div id="pic"><? echo CHtml::image(Yii::app()->request->baseUrl."/Comics/".$json['comic']['comic']['imagen']); ?><a href="#" class="btn"><i class="icon-trash"></i> Eliminar</a>
        <div><span><? echo $json['comic']['comic']['NoCompartido']; ?></span><a href="#" class="btn"><i class="icon-share"></i> Compartir</a></div>
      </div>
      <div id="comentarios">
        <div><?echo CHtml::image('https://graph.facebook.com/'.$json['comic']['usuario']['idFb'].'/picture')?><span><? echo utf8_decode($json['comic']['usuario']['nombre']); ?></span></div>
        <form>
          <textarea></textarea>
          <button type="button" class="btn"><i class="icon-comment"></i> Comentar</button>
        </form>
       

        <article>
          <h3>Usuario</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque.</p>
        </article>
        <article>
          <h3>Usuario</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque.</p>
        </article>
        <article>
          <h3>Usuario</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque.</p>
        </article>
      

      </div>
    </div>
    

     
    <script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kinetic-v4.3.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.lazyload.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hashchange.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>

  </body>
</html>