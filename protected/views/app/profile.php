 <section id="panelPersonaje">
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div><img src="http://ima.gs/transparent/NONE/A2A2A2/258x460.png"></div>
        <div id="actions"><a href="#" class="btn"><i class="icon-edit"></i> Editar</a></div>
</section>
<section id="panelContent">
     <h2>Mis Memes</h2>
        <div class="tabs"><a id="dest" class="menu" href="#" >Destacados</a><a id="mismemes" href="#" class="selectedTab menu">Mis Memes</a><a  id="misamigos"  class="menu" href="#">De mis amigos</a><a id="categoria" class="menu" href="#">Por categoría</a></div>
        <div class="memeThumbs">
          <div class="itemMeme"><a href="<?php echo CController::CreateUrl('Comics/create'); ?>" class="itemAction"><i class="icon-plus-sign"></i>Crea Nuevo Meme</a></div>
              <? 
              if(is_array($json['avatar']['comics'])){
                    foreach ($json['avatar']['comics'] as $key => $value) {
                     echo '<div class="itemMeme"><a href="#a">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen'],"Comic").'</a></div>';
                 } 
               }    
               ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
</section>