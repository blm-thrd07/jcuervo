
<?

$cantidad_resultados=count($resultado);
for($i=0;$i<$cantidad_resultados;$i++){

             echo '<div class="itemMeme"><a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/detalle/'.$resultado[$i]->id.'"  class="js-lightbox">'.CHtml::image(Yii::app()->request->baseUrl."/Comics/".$resultado[$i]->Comic->imagen).'</a><div><a href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/App/Profile/'.$resultado[$i]->Usuario->id_facebook.'">'.CHtml::image('https://graph.facebook.com/'.$resultado[$i]->Usuario->id_facebook.'/picture').'</a></div>
                 </div>';
}
?>