        <h2>Mis Memes</h2>
        <div class="tabs"><a id="mismemes" href="#" class="menu selectedTab">Mis Memes</a><a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        <div class="memeThumbs">
        <div class="itemMeme"><a href="#c" class="itemAction"><i class="icon-plus-sign"></i>Crea Nuevo Meme</a></div>
        <? 
        

        if(is_array($comics)){
         if(count($comics)!=0){
            print_r($comics['comics']);
           foreach ($comics['comics'] as $key => $value) {
echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["idFb"].'"  class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['idFb'].'">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div>
                 </div>';             
             } 
           }

         }        
        ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
    
         <? //print_r(json_encode($comics)); 
         ?>