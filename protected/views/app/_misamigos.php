
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
          
          <?

           if(count($comicsAmigos)!=0){
           


           foreach ($comicsAmigos as $key => $value) {


            foreach ($value as $ke => $val) {


                  echo $val['imagen'];
            }
           }


/*
            $cantidad_amigos=count($comicsAmigos);

            for($amigo=0;$amigo<$cantidad_amigos;$amigo++){

             
              $cantidad_comics_amigo=count($comicsAmigos[$amigo]);

                for($comic=0;$comic<$cantidad_comics_amigo; $comic++){

/*
echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$comicsAmigos[$amigo][$comic]["id"].'"  class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$comicsAmigos[$amigo][$comic]['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$comicsAmigos[$amigo][$comic]['idFb'].'">'.CHtml::image('https://graph.facebook.com/'.$comicsAmigos[$amigo][$comic]['idFb'].'/picture').'</a></div>
                  </div>';
                  */

                }

                

            }
 
 */
             
            }  

                        
          ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>


