<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memegenerator Jose Cuervo Especial</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css">
    <script> var iU=<?echo Yii::app()->session['id_facebook'];?>; </script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox.css">
  </head>
  <body>
  
  <div id="container">
    <? 
    $ca = split('/', $_SERVER['PATH_INFO']);
    print_r($ca);

    ?>
    <?php echo $content; ?>
  </div>

    <?php
       $baseUrl = Yii::app()->baseUrl; 
       $cs = Yii::app()->getClientScript();
       $cs->registerCoreScript('jquery');
       $cs->registerCoreScript('jquery.min');
    ?>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kinetic-v4.3.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.lazyload.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easytabs.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hashchange.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js"></script>
  </body>
</html>