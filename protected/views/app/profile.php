 <a href="<? echo $logoutUrl ?>"> LOGOUT</a>
 <section id="crearPersonaje">
      <h1>Crea tu personaje</h1>
      <h2><?echo $json['usuario']['nombre']; ?></h2>
      <div class="canvas">
        <div id="personajeCanvas"></div>
      </div>
      <div class="controllers"><a href="#" id="remove" class="btn">remove</i></a><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-listenerStat" class="btn">JSON log</a><a href="#" id="js-toImage" class="btn"><i class="icon-picture"></i></a></div>
      <div class="tabEngine itemSelector">
        <ul>
          <li><a href="#tab1">Cabeza</a></li>
          <li><a href="#tab2">Cuerpo</a></li>
          <li><a href="#tab3">Accesorios</a></li>
          <li><a href="#tab4">Boca</a></li>
          <li><a href="#tab5">Tangas</a></li>
          <li><a href="#tab6">Otros</a></li>
        </ul>
        <div id="tab1">
          <? 
           foreach ($json['catalogos']['caras'] as $key => $value) {
              echo   '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/200x200.png","cabeza",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
            }
         ?>
        </div>
        <div id="tab2">
        <?
            foreach ($json['catalogos']['cuerpos'] as $key => $value) {
              echo   '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"cabeza",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
            }
        ?>
        </div>
        <div id="tab3">
          <?
               if(is_array($json['catalogos']['accesorios'])){
	              foreach ($json['catalogos']['accesorios'] as $key => $value) {
                echo '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/img/".$value['url'],"accesorio",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
	              }
              }
          ?>
        </div>
        <div id="tab4">
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab5">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
        <div id="tab6">
          <div class="item"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/200x200.png"></div>
        </div>
      </div>
    </section>


    <section>
            <h1>Mi Avatar.</h1>
            <? echo "<img src='https://apps.t2omedia.com.mx/php2/jcuervo/Avatar/".$json['avatar']['avatarImg']."' />"; ?>

    </section>
    <section>
      <h1>Memes de mis amigos</h1>
      <?
if(is_array($json['AmigosAvatars'])){
                foreach ($json['AmigosAvatars'] as $key => $value) {
                echo '<div class="item">'.CHtml::image(Yii::app()->request->baseUrl."/Avatar/".$value['avatar_img'],$value['nombre'],array('id'=>$value['idFb'])).'</div>'; 
                }
              }
      ?>
    </section>



<div id="data">
<?php //$this->renderPartial('_ajaxPieza', array('piezas'=>$piezas),false,true); ?>
</div>

<?php
//print_r($json);
echo json_encode($json);


echo CHtml::link("cara_web", "#", array('class'=>"insertar",'name'=>"url_cara_web"))." "; 

//pieza//accesorio//cara_web
Yii::app()->getClientScript()->registerScript('registrar', '
	$(".insertar").live("click",function(){
		var pieza_id = $(this).attr("name");
		$.ajax({
		  type: "POST",
		  data: "pieza_id="+pieza_id+"&accion=INSERTAR&tipo=pieza",
		  success: function() {  },
		  error: function(){ alert("error"); },
		  url: "'.CController::CreateUrl('avatars/UpdatePieza').'",
		  cache:false
		});
	});
	

',CClientScript::POS_READY);

?>
