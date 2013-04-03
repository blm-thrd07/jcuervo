
        <h2>Memes de mis amigos</h2>
        <div class="tabs"><a id="dest" class="menu" href="#" >Destacados</a><a id="mismemes" href="#" class="menu">Mis Memes</a><a  id="misamigos"  class="selectedTab menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        <div class="memeThumbs">
          
          <div class="itemMeme"><a href="detalle.html"><img src="http://placehold.it/640x480.png"></a>
            <div><a href="amigo.html"><img src="http://placehold.it/32x32.png"></a></div>
          </div>
          
          <?


        if(is_array($comicsAmigos['comicsAmigos'])){
        
        foreach ($comicsAmigos['comicsAmigos'] as $key => $value) {
          
               
             print_r($value);
           
            echo '<div class="itemMeme"><a href="detalle.html">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a><div><a href="amigo.html">'.CHtml::image('https://graph.facebook.com/'.$value['idFb'].'/picture').'</a></div>
             </div>';

            

             
           } 
         }

                
        ?>


        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
        <?
            print_r(json_encode($comicsAmigos));
        ?>