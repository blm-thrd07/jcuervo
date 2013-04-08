 <section id="panelPersonaje">
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div><? echo "<img src='https://apps.t2omedia.com.mx/php2/jcuervo/Avatar/".$json['avatar']['avatarImg']."' />"; ?></div>
        <div id="actions"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/avatars/update/<?echo Yii::app()->session['usuario_id']; ?>" class="btn"><i class="icon-edit"></i> Editar</a></div>
</section>
<section id="panelContent">
     <h2>Mis Memes</h2>
        <div class="tabs"><a id="mismemes" href="#" class="selectedTab menu">Mis Memes</a><a  id="misamigos"  class="menu" href="#">De mis amigos</a><a id="categoria" class="menu" href="#">Por categoría</a></div>
        <div class="memeThumbs">
          <div class="itemMeme"><a href="<?php echo CController::CreateUrl('Comics/create'); ?>" class="itemAction"><i class="icon-plus-sign"></i>Crea Nuevo Meme</a></div>
              <?php 
              if(is_array($json['avatar']['comics'])){
                    foreach ($json['avatar']['comics'] as $key => $value) {
                     echo '<div class="itemMeme"><a href="#a">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$value['imagen'],"Comic").'</a></div>';
                 } 
               }    
               ?>
        </div>
        <div class="pager"><a href="#" class="btn"><i class="icon-chevron-left"></i></a><a href="#" class="btn"><i class="icon-chevron-right"></i></a></div>
</section>

<?php

Yii::app()->getClientScript()->registerScript('jquery', 
"   
$('.ajax').colorbox({
 iframe:true, innerWidth:500, innerHeight:630,onClosed:function(){
    $.ajax({
      url: '".Yii::app()->createUrl('App/nombrefoto')."',
      
    }).done(function ( data ) {
        document.getElementById('imagen-perfil').innerHTML =' <img src=\"page.html\" width=\'112\'  height=\'112\' /> ';
    });
 }
}); 
 ",
  CClientScript::POS_READY
);
?>