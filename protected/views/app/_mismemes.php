<? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
        <h2>Mis Memes</h2><a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
     <? } else {?>
         <h2>Memes de <? echo $json['usuario']['nombre'] ?></h2><a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
     <? } ?>
    
<div class="tabs">
  <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
  <a  href="<? echo Yii::app()->session['protocol']; ?>apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>"  class="selectedTab">Mis Memes</a>
      <? } else {?>
  <a  href="<? echo Yii::app()->session['protocol']; ?>apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>">Mis Memes</a>
  <? } ?>
  <a  id="misamigos"  class="menu" href="#">De mis amigos</a><a id="categoria" class="menu" href="#">Por categoría</a></div>

<div class="js-slides">
    <div class="slides_container">        
       <div class="slide itemThumbs">  
         <? if(is_array($comics['comics'])){
         if(count($comics['comics'])!=0){
           foreach ($comics['comics'] as $key => $value) {
                 echo ' <div class="itemThumbnail"><a data-fancybox-type="iframe" href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["id"].'" class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a></div>';        
             } 
           }
         }  
        ?>
       </div>

      </div>
</div>
