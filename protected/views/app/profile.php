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


 <a href="<? echo $logoutUrl ?>"> LOGOUT</a>
 <section id="crearPersonaje">
      <h1>Crea tu personaje</h1>
      <h2><?echo $json['usuario']['nombre']; ?></h2>
      <div class="canvas">
        <div id="personajeCanvas"></div>
      </div>
      <div class="controllers"><a href="#" id="remove" class="btn">remove</i></a><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-listenerStat" class="btn">JSON log</a><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a></div>
      <div class="tabEngine itemSelector">
        <ul>
          <li><a href="#tab1">Cabeza</a></li>
          <li><a href="#tab2">Cuerpo</a></li>
          <li><a href="#tab3">Accesorios</a></li>
          <li><a href="#tab4">Boca</a></li>
          <li><a href="#tab5">Tangas</a></li>
          <li><a href="#tab6">Otros</a></li>
        </ul>
        <div id="tab1">
          <? 
          if(is_array($json['catalogos']['caras'])){
           foreach ($json['catalogos']['caras'] as $key => $value) {
              echo   '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/200x200.png","cabeza",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
            }
          }
         ?>
        </div>
        <div id="tab2">
        <?
          if(is_array($json['catalogos']['cuerpos'])){
            foreach ($json['catalogos']['cuerpos'] as $key => $value) {
              echo   '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cabeza",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
            }
          }
        ?>
        </div>
        <div id="tab3">
          <?
               if(is_array($json['catalogos']['accesorios'])){
                foreach ($json['catalogos']['accesorios'] as $key => $value) {
                echo '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"accesorio",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                }
              }
          ?>
        </div>
        <div id="tab4">
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab5">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab6">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
      </div>
    </section>


    <section>
            <h1>Mi Avatar.</h1>
            <? echo "<img src='https://apps.t2omedia.com.mx/php2/jcuervo/Avatar/".$json['avatar']['avatarImg']."' />"; ?>

    </section>
    <section>
      <h1>Avatars de mis amigos</h1>
      <?
      
if(is_array($json['avatar']['amigosAvatars'])){
                foreach ($json['avatar']['amigosAvatars'] as $key => $value) {
                echo '<div><h2>'.$value['nombre'].'</h2>'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture',$value['nombre'],array('id'=>$value['idFb'])).'  '.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$value['avatar_img'],$value['nombre'],array('id'=>$value['idFb'])).'</div>'; 
                }
              }

              

      ?>
    </section>

<?php
echo json_encode($json);
?>
