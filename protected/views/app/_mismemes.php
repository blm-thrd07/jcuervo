
<? print_r($comics); ?>

        <h2>Mis Memes</h2>
        <div class="tabs"><a id="dest" class="menu" href="#" >Destacados</a><a id="mismemes" href="#" class="menu selectedTab">Mis Memes</a><a  id="misamigos"  class="menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        <div class="memeThumbs">
        <div class="itemMeme"><a href="#c" class="itemAction"><i class="icon-plus-sign"></i>Crea Nuevo Meme</a></div>
        <? 
        if(is_array($comics)){
       /*
        foreach ($comics['comics'] as $key => $value) {
             echo '<div class="itemMeme"><a href="#a">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen'],"Comic").'</a></div>';
           } 
           */
         }        
        ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
    
         <? //print_r(json_encode($comics)); 
         ?>