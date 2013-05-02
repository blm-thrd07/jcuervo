<script>
 $(function() {
    return $('.js-slides, .js-slides-comic').slides({
      preload: false,
      slideSpeed: 450,
      generatePagination: false,
      generateNextPrev: false
    });
  });
</script> 
        <a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
     

        <div class="tabs"><a   href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>" class="mismemesmenu" >Mis Memes</a> <a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="selectedTab menu" href="">Por categoría</a></div>
        <div class="memeThumbs">
          <div class="itemMeme"><a href="#" id="catmasvist" class="itemAction subcat selectedTab"><i class="icon-eye-open"></i>Los + Vistos</a></div>
          <div class="itemMeme"><a href="#" id="catmascomp" class="itemAction subcat"><i class="icon-plus-sign"></i>Los + Compartidos</a></div>
          <div class="itemMeme"><a href="#" id="catmascome" class="itemAction subcat"><i class="icon-share-alt"></i>Los + Comentados</a></div>
          <div class="itemMeme"><a href="#" id="catjoscuer" class="itemAction subcat"><i class="icon-star"></i>Seleccion Especial José Cuervo</a></div>
        </div>


          <div class="js-slides">
          <div class="slides_container response">

              <?  $this->renderPartial('//app/_filtros',array('resultado'=>$resultado)); ?>


           </div>
        </div>
       <? echo '<a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>'; ?> 
