     <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
        <h2>Mis Memes</h2><a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
     <? } else {?>
         <h2>Memes de <? echo $json['usuario']['nombre'] ?></h2>
     <? } ?>
     
        <div class="tabs"><a  href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>">Mis Memes</a><a  id="misamigos"  class="selectedTab menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        

       <div class="js-slides">
          <div class="slides_container">


            
          <? 
          if(((int)$cantidad_amigos)==0){?>
              <article id="noFriends">
                <div id='fb-root'></div>
                <h3>:(</h3>
                <p>No tienes amigos compartiendo memes aún. Pero puedes invitar a que se unan.</p>
                <a href="#" class="btn" onclick="FacebookInviteFriends();" ><i class="icon-group"></i> Invitar Amigos</a>
              </article>
          <? } ?>
          

         <div class="slide itemThumbs">

          <?

           if(count($comicsAmigos)!=0){
            foreach ($comicsAmigos as $key => $value) { 

        echo '<div class="itemThumbnail"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["id"].'"  id="'.$value["id"].'"  class="js-lightbox cdetail">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['id_facebook'].'">'.CHtml::image('https://graph.facebook.com/'.$value['id_facebook'].'/picture').'</a></div></div></div>';
              }
             
            }  
               
          ?>






        </div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>
      </div>
