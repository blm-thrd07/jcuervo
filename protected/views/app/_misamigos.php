
        <h2>Memes de mis amigos</h2>
        <div class="tabs"><a  href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>">Mis Memes</a><a  id="misamigos"  class="selectedTab menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        <div class="memeThumbs">


          <? 
          if(((int)$cantidad_amigos)==0){?>
              <article id="noFriends">
                <div id='fb-root'>
                <h3>:(</h3>
                <p>No tienes amigos compartiendo memes aún. Pero puedes invitar a que se unan.</p>
                <a href="#" class="btn" onclick="FacebookInviteFriends();" ><i class="icon-group"></i> Invitar Amigos</a>
              </article>
          <? } ?>
          
          <?

           if(count($comicsAmigos)!=0){
            foreach ($comicsAmigos as $key => $value) {
              echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["id"].'"  id="'.$value["id"].'" class="js-lightbox cdetail">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['id_facebook'].'">'.CHtml::image('https://graph.facebook.com/'.$value['id_facebook'].'/picture').'</a></div>
                  </div>';        
              }
             
            }  
               
          ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>


