
        <h2>Memes de mis amigos</h2>
        <div class="tabs"><a id="mismemes" href="#" class="menu">Mis Memes</a><a  id="misamigos"  class="selectedTab menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        <div class="memeThumbs">
          <? if(count($comicsAmigos)==0){?>
              <article id="noFriends">
                <div id='fb-root'>
                <h3>:(</h3>
                <p>No tienes amigos compartiendo memes aún. Pero puedes invitar a que se unan.</p>
                <a href="#" class="btn" onclick="FacebookInviteFriends();" ><i class="icon-group"></i> Invitar Amigos</a>
              </article>
          <? } ?>
          
          <? if(count($comicsAmigos)!=0){
             foreach ($comicsAmigos['comicsAmigos'] as $key => $value){
                echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["idFb"].'"  class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['idFb'].'">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div>
                 </div>';
              }    
            }               
          ?>

          <div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/<? echo $value["idFb"]?>" class="js-lightbox"><img src="http://placehold.it/640x480.png"></a>
            <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
          </div>


        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>


