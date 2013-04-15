 <section id="panelPersonaje">
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div><? echo "<img src='https://apps.t2omedia.com.mx/php2/jcuervo/Avatar/".$json['usuario']['avatar_img']."' />"; ?></div>
        <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
        <div id="actions"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/avatars/update/<?echo Yii::app()->session['usuario_id']; ?>" class="btn"><i class="icon-edit"></i> Editar</a></div>
        <? }?>
</section>
<section id="panelContent">
     
     <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
        <h2>Mis Memes</h2>
     <? } else {?>
         <h2>Memes de <? echo $json['usuario']['nombre'] ?></h2>
     <? } ?>
     
        <div class="tabs"><a  href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>" class="selectedTab">Mis Memes</a><a  id="misamigos"  class="menu" href="#">De mis amigos</a><a id="categoria" class="menu" href="#">Por categoría</a></div>
        <div class="memeThumbs">
          <div class="itemMeme"><a href="<?php echo CController::CreateUrl('Comics/create'); ?>" class="itemAction"><i class="icon-plus-sign"></i>Crea Nuevo Meme</a></div>
               <? 
        if(is_array($comics['comics'])){
         if(count($comics['comics'])!=0){
           foreach ($comics['comics'] as $key => $value) {
                 echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["id"].'"  class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['idFb'].'">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div>
                 </div>';             
             } 
           }

         }  
        ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
</section>
