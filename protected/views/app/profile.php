        <a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
    
        <div class="tabs"><a  href="<? echo Yii::app()->session['protocol']; ?>apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>" class="mismemesmenu" >Mis Memes</a><a  id="misamigos"  class="selectedTab menu" href="">De mis amigos</a><a id="categoria" class="menu" href="">Por categoría</a></div>
        

   <? 
          if(((int)$cantidad_amigos)==0){?>
              <article id="noFriends">
                <div id='fb-root'></div>
                <h3>:(</h3>
                <p>No tienes amigos compartiendo memes aún. Pero puedes invitar a que se unan.</p>
                <a href="#" class="btn" onclick="FacebookInviteFriends();" ><i class="icon-group"></i> Invitar Amigos</a>
              </article>
          <? } ?>
     <?     

/*
       <div class="js-slides">
          <div class="slides_container">
            
       

         <div class="slide itemThumbs">

          <?

           if(count($comicsAmigos)!=0){
          
            foreach ($comicsAmigos as $key => $value) { 
                   
                   if($key<10){
                   
                    echo '<div class="itemThumbnail"><div><a data-fancybox-type="iframe" href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["id"].'"  id="'.$value["id"].'"  class="js-lightbox cdetail">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a><div><a href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$value['id_facebook'].'">'.CHtml::image('https://graph.facebook.com/'.$value['id_facebook'].'/picture').'</a></div></div></div>';
                   
                   }
              }
             
            }  
               
          ?>

        </div>

        </div>
        <a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>
        
      </div>
      */

      ?>


      

<div class="js-slides">
          <div class="slides_container">
            <div class="slide itemThumbs">

              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
            </div>
            <div class="slide itemThumbs">
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
              <div class="itemThumbnail">
                <div><a data-fancybox-type="iframe" href="detalle.html" class="js-lightbox"><img src="http://ima.gs/transparent/000000/A2A2A2/640x480.png"></a></div>
              </div>
            </div>
          </div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a>
        </div>




<? /*
<div id="container">

<section id="panelPersonaje">
        <div id="memeGeneratorLogo"><span>Memespecial</span><span>Generator</span></div>
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div><? echo "<img src='https://apps.t2omedia.com.mx/php2/jcuervo/Avatar/".$json['usuario']['avatar_img']."' />"; ?></div>
        <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
        <div id="actions"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/avatars/update/<?echo Yii::app()->session['usuario_id']; ?>" class="btn"><i class="icon-edit"></i> Editar</a></div>
        <? }?>
</section>

<section id="panelContent">
     
 <a href="<?php echo CController::CreateUrl('Comics/create'); ?>">Crea un meme nuevo</a>
         
<div class="tabs">
  <? if(Yii::app()->session['id_facebook']==$json['usuario']['id_facebook']){ ?>
  <a  href="<? echo Yii::app()->session['protocol']; ?>apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>"  class="mismemesmenu selectedTab">Mis Memes</a>
      <? } else {?>
  <a  href="<? echo Yii::app()->session['protocol']; ?>apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/<? echo Yii::app()->session['id_facebook']; ?>" class="mismemesmenu">Mis Memes</a>
  <? } ?>
  <a  id="misamigos"  class="menu" href="#">De mis amigos</a><a id="categoria" class="menu" href="#">Por categoría</a></div>
<? if(Yii::app()->session['id_facebook']!=$json['usuario']['id_facebook']){ ?>
              <h2>Memes de <? echo $json['usuario']['nombre'] ?></h2>
     <? }?>


<? 
<div class="js-slides">
    <div class="slides_container">        
       <div class="slide itemThumbs"> 

         <? if(is_array($comics)){
         if(count($comics)!=0){
           foreach ($comics as $key => $value) {
                 echo '<div class="itemThumbnail"><div><a data-fancybox-type="iframe" href="'.Yii::app()->session['protocol'].'apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$value["id"].'" class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen']).'</a></div></div>';        
             } 
           }
         }  
        ?>

       </div>

      </div>
</div>

?>



</section>
</div>

*/ ?>
