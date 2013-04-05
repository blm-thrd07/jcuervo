<h2>Destacados</h2>
        <div class="tabs"><a id="mismemes" href="#" class="menu">Mis Memes</a><a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
         <div class="memeThumbs"> 
         <? 
            $cantidad_resultados=count($resultado);
            for($i=0;$i<$cantidad_resultados;$i++){
                  echo '<div class="itemMeme"><a href="detalle.html">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$resultado[$i]->Comic->imagen).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$resultado[$i]->Usuario->id_facebook.'">'.CHtml::image('https://graph.facebook.com/'.$resultado[$i]->Usuario->id_facebook.'/picture').'</a></div>
             </div>';
            }  
        ?>
         </div>        
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>