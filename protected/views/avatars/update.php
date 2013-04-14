<div id="container">
    <div id="caraweb"></div>

      <section id="panelPersonaje">
        <h1><?echo $json['usuario']['nombre']; ?></h1>
        <div id="personajeCanvas"></div>
        <div id="actions"><a href="#" id="js-rotateLeft" class="btn"><i class="icon-undo"></i></a><a href="#" id="js-rotateRight" class="btn"><i class="icon-repeat"></i></a><a href="#" id="js-sendFront" class="btn"><i class="icon-circle-arrow-up"></i></a><a href="#" id="js-sendBack" class="btn"><i class="icon-circle-arrow-down"></i></a><a href="#" id="js-resetRotation" class="btn"><i class="icon-refresh"></i></a><a href="#" id="js-removeElement" class="btn"><i class="icon-trash"></i></a></div>
      </section>
      <section id="panelContent">
        <h2>Crea tu Personaje</h2>
        <div class="saveBtn"><a href="#" id="js-listenerStat" class="btn"><i class="icon-save"></i> Guardar       </a></div>
        <div class="js-tabEngine itemSelector">
          <ul>
            <li><a href="#tab1">Cabeza</a></li>
            <li><a href="#tab2">Cuerpo</a></li>
            <li><a href="#tab3">Ojos</a></li>
            <li><a href="#tab4">Boca</a></li>
            <li><a href="#tab5">Accesorios</a></li>
          </ul>
          <div id="tab1" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['caras']);
                if(is_array($json['catalogos']['caras'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['caras'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/cabezas/".$value['url'],"caras",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab2" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['cuerpos']);
                if(is_array($json['catalogos']['cuerpos'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['cuerpos'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/cuerpos/".$value['url'],"cuerpos",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab3" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['ojos']);
                if(is_array($json['catalogos']['ojos'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['ojos'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/ojos/".$value['url'],"ojos",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab4" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['bocas']);
                if(is_array($json['catalogos']['bocas'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['bocas'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/bocas/".$value['url'],"bocas",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
          <div id="tab5" class="memeThumbs">
            <? 
              $bandera=false;
              $count=count($json['catalogos']['accesorios']);
                if(is_array($json['catalogos']['accesorios'])){
                  if($count>12) echo '<div class="js-slides"><div class="slides_container">';
                  foreach ($json['catalogos']['accesorios'] as $key => $value) {  
                    if($key%12==0 && $count>12) {
                      if($bandera) echo '</div>'; else $bandera=true;
                      echo '<div class="slide">';
                    }
                    echo '<div class="itemMeme">'.CHtml::image(Yii::app()->request->baseUrl."/images/accesorios/".$value['url'],"accesorios",array('id'=>$value['id']."-".$value['tipo_pieza_id'])).'</div>'; 
                  }
                  if($count>12) echo '</div></div><a class="prev"><i class="icon-chevron-left"></i></a><a class="next"><i class="icon-chevron-right"></i></a></div>';//btns pre <a ....
                }
            ?>
          </div>
        </div>
      </section>
    </div>

<a data-fancybox-type="iframe" href="http://apps.t2omedia.com.mx/php2/jcuervo/index.php/CaraWeb/create/"  class="js-lightbox">cam web</a>
<div id="wrapper">
<div style="display: none;" id="overlay"></div>
<div style="display: none;" id="popup">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif" />
</div>
</div>
 
<style type="text/css">
#wrapper{
    width:1002px;
    margin:10px auto;
    text-align:center;
  }

  #overlay {
    background: black;
    opacity:0.5;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 10000;
  }
  
  #popup {
    background: none repeat scroll 0 0 white;
    border: 20px solid #DDDDDD;
    left: 31%;
    padding: 50px;
    position: fixed;
    text-align: center;
    top: 28%;
    width: 380px;
    z-index: 20000;
    -moz-border-radius:30px 0;
  }
</style>


<?php

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/slides.min.jquery.js'); 

//echo json_encode($json);
//Yii::app()->request->baseUrl
Yii::app()->getClientScript()->registerScript('registrar', '
  var avatar = '.CJSON::encode($json['avatar']).';
  var _0xc5bf=["\x2F\x70\x68\x70\x32\x2F\x6A\x63\x75\x65\x72\x76\x6F","\x70\x65\x72\x73\x6F\x6E\x61\x6A\x65\x43\x61\x6E\x76\x61\x73","\x63\x6C\x69\x63\x6B","\x73\x65\x74\x53\x74\x72\x6F\x6B\x65","\x73\x65\x74\x53\x74\x72\x6F\x6B\x65\x57\x69\x64\x74\x68","\x64\x72\x61\x77","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x67\x65\x74\x43\x6F\x6E\x74\x61\x69\x6E\x65\x72","\x67\x65\x74\x57\x69\x64\x74\x68","\x67\x65\x74\x48\x65\x69\x67\x68\x74","\x6C\x65\x6E\x67\x74\x68","\x61\x76\x61\x74\x61\x72\x50\x69\x65\x7A\x61\x73","\x64\x65\x73\x63\x72\x69\x70\x63\x69\x6F\x6E","\x63\x61\x72\x61","\x70\x6F\x73\x78","\x70\x6F\x73\x79","\x72\x6F\x74\x61\x74\x69\x6F\x6E","\x70\x69\x65\x7A\x61\x69\x64","\x74\x69\x70\x6F\x5F\x70\x69\x65\x7A\x61\x5F\x69\x64","\x63\x75\x65\x72\x70\x6F","\x6F\x6A\x6F\x73","\x62\x6F\x63\x61","\x75\x72\x6C","\x63\x61\x72\x61\x5F\x77\x65\x62","\x69\x64","\x61\x63\x63\x65\x73\x6F\x72\x69\x6F\x73","\x61\x63\x63\x65\x73\x6F\x72\x69\x6F\x49\x6D\x67","\x61\x63\x63\x65\x73\x6F\x72\x69\x6F\x73\x5F\x69\x64","\x61\x64\x64","\x2D","\x73\x70\x6C\x69\x74","\x61\x74\x74\x72","\x69\x6D\x67","\x66\x69\x6E\x64","\x73\x72\x63","\x6F\x6E","\x23\x74\x61\x62\x31\x20\x2E\x69\x74\x65\x6D\x4D\x65\x6D\x65","\x23\x74\x61\x62\x32\x20\x2E\x69\x74\x65\x6D\x4D\x65\x6D\x65","\x23\x74\x61\x62\x35\x20\x2E\x69\x74\x65\x6D\x4D\x65\x6D\x65","\x23\x74\x61\x62\x34\x20\x2E\x69\x74\x65\x6D\x4D\x65\x6D\x65","\x23\x74\x61\x62\x33\x20\x2E\x69\x74\x65\x6D\x4D\x65\x6D\x65","","\x72\x65\x70\x6C\x61\x63\x65","\x72\x65\x6D\x6F\x76\x65","\x78","\x61\x74\x74\x72\x73","\x79","\x69\x6D\x61\x67\x65","\x6F\x6E\x6C\x6F\x61\x64","\x77\x69\x64\x74\x68","\x68\x65\x69\x67\x68\x74","\x6D\x6F\x76\x65\x54\x6F\x42\x6F\x74\x74\x6F\x6D","\x6D\x6F\x75\x73\x65\x6F\x76\x65\x72","\x39\x38\x30\x64\x32\x65","\x6D\x6F\x75\x73\x65\x6F\x75\x74","\x74\x69\x70\x6F","\x64\x72\x61\x67\x73\x74\x61\x72\x74","\x73\x74\x6F\x70","\x73\x74\x61\x72\x74\x53\x63\x61\x6C\x65","\x73\x65\x74\x41\x74\x74\x72\x73","\x64\x72\x61\x67\x65\x6E\x64","\x67\x65\x74\x5A\x49\x6E\x64\x65\x78","\x6C\x6F\x67","\x65\x6C\x61\x73\x74\x69\x63\x2D\x65\x61\x73\x65\x2D\x6F\x75\x74","\x74\x72\x61\x6E\x73\x69\x74\x69\x6F\x6E\x54\x6F","\x66\x69\x72\x65","\x2F\x69\x6D\x61\x67\x65\x73\x2F\x63\x61\x62\x65\x7A\x61\x73\x2F","\x2F\x69\x6D\x61\x67\x65\x73\x2F\x63\x75\x65\x72\x70\x6F\x73\x2F","\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6F\x6A\x6F\x73\x2F","\x2F\x69\x6D\x61\x67\x65\x73\x2F\x62\x6F\x63\x61\x73\x2F","\x2F\x41\x76\x61\x74\x61\x72\x43\x61\x72\x61\x73\x2F","\x70\x75\x73\x68","\x2F\x69\x6D\x61\x67\x65\x73\x2F\x61\x63\x63\x65\x73\x6F\x72\x69\x6F\x73\x2F","\x4E\x4F\x20\x53\x45\x20\x49\x4E\x53\x45\x52\x54\x4F","\x74\x6F\x4A\x53\x4F\x4E","\x70\x61\x72\x73\x65","\x63\x68\x69\x6C\x64\x72\x65\x6E","\x64\x69\x73\x70\x6C\x61\x79","\x62\x6C\x6F\x63\x6B","\x63\x73\x73","\x23\x6F\x76\x65\x72\x6C\x61\x79","\x23\x70\x6F\x70\x75\x70","\x73\x6C\x6F\x77","\x66\x61\x64\x65\x49\x6E","\x69\x6D\x61\x67\x65\x2F\x70\x6E\x67","\x50\x4F\x53\x54","\x69\x6E\x64\x65\x78\x2E\x70\x68\x70\x2F\x61\x76\x61\x74\x61\x72\x73\x2F\x55\x70\x64\x61\x74\x65\x50\x69\x65\x7A\x61","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x6E\x6F\x6E\x65","\x68\x75\x62\x6F\x20\x75\x6E\x20\x65\x72\x72\x6F\x72\x20\x61\x6C\x20\x67\x75\x61\x72\x64\x61\x72\x20\x3A\x28","\x61\x6A\x61\x78","\x74\x6F\x44\x61\x74\x61\x55\x52\x4C","\x69\x6E\x64\x65\x78\x2E\x70\x68\x70\x2F\x43\x61\x72\x61\x57\x65\x62\x2F\x64\x65\x6C\x65\x74\x65","\x6E\x6F\x20\x65\x6C\x69\x6D\x69\x6E\x61\x64\x6F","\x69\x6E\x64\x65\x78\x4F\x66","\x73\x70\x6C\x69\x63\x65","\x67\x65\x74\x52\x6F\x74\x61\x74\x69\x6F\x6E","\x65\x61\x73\x65\x2D\x6F\x75\x74","\x6D\x6F\x76\x65\x55\x70","\x6D\x6F\x76\x65\x44\x6F\x77\x6E","\x23\x6A\x73\x2D\x6C\x69\x73\x74\x65\x6E\x65\x72\x53\x74\x61\x74","\x23\x6A\x73\x2D\x72\x6F\x74\x61\x74\x65\x4C\x65\x66\x74","\x23\x6A\x73\x2D\x72\x6F\x74\x61\x74\x65\x52\x69\x67\x68\x74","\x23\x6A\x73\x2D\x73\x65\x6E\x64\x46\x72\x6F\x6E\x74","\x23\x6A\x73\x2D\x72\x65\x6D\x6F\x76\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x23\x6A\x73\x2D\x72\x65\x73\x65\x74\x52\x6F\x74\x61\x74\x69\x6F\x6E","\x23\x6A\x73\x2D\x73\x65\x6E\x64\x42\x61\x63\x6B","\x73\x65\x6C\x65\x63\x74\x65\x64","\x65\x61\x73\x79\x74\x61\x62\x73","\x2E\x6A\x73\x2D\x74\x61\x62\x45\x6E\x67\x69\x6E\x65","\x73\x6C\x69\x64\x65\x73","\x2E\x6A\x73\x2D\x73\x6C\x69\x64\x65\x73","\x72\x65\x61\x64\x79"];var BaseUrl=_0xc5bf[0];var accesorios=[];var piezas=[];var angle,cara,cara_web,cuerpo,ojos,boca,currentLayer,currentSelected,layerPersonaje,listenerStat,newangle,rotateLeft,rotateRight,saveToImage,sendBack,sendFront,stagePersonaje,removeImage,scale,startScale,trans;caraWebInsert=true;currentSelected=null;scale=1;scaleUpFactor=1.05;trans=null;stagePersonaje= new Kinetic.Stage({container:_0xc5bf[1],width:258,height:460});layerPersonaje= new Kinetic.Layer();stagePersonaje[_0xc5bf[7]]()[_0xc5bf[6]](_0xc5bf[2],function (_0xd353x19){if(currentSelected){currentSelected[_0xc5bf[3]](null);currentSelected[_0xc5bf[4]](0);currentSelected=null;layerPersonaje[_0xc5bf[5]]();} ;} );halfx=stagePersonaje[_0xc5bf[8]]()/2;halfy=stagePersonaje[_0xc5bf[9]]()/2;scale=1;confCaraWeb={x:halfx,y:halfy-170,height:100,width:100,draggable:true,offset:[60,60],startScale:scale,tipo:2};confCara={x:halfx,y:halfy-170,height:120,width:120,draggable:true,offset:[60,60],startScale:scale,tipo:3};confCuerpo={x:halfx,y:halfy+50,height:320,width:200,draggable:true,offset:[100,160],startScale:scale,tipo:4};confOjos={x:halfx,y:halfy-160,height:22,width:95,draggable:true,offset:[47,11],startScale:scale,tipo:5};confBoca={x:halfx,y:halfy-140,height:22,width:95,draggable:true,offset:[47,11],startScale:scale,tipo:6};confAccesorio={x:halfx,y:halfy-100,height:160,width:160,draggable:true,offset:[80,80],startScale:scale,tipo:1};for(var k=0;k<avatar[_0xc5bf[11]][_0xc5bf[10]];k++){if(avatar[_0xc5bf[11]][k][_0xc5bf[12]]===_0xc5bf[13]){insertarPieza(_0xc5bf[13],avatar[_0xc5bf[11]][k].AvatarImg,{x:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[14]]),y:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[15]]),rotation:parseFloat(avatar[_0xc5bf[11]][k][_0xc5bf[16]]),id:avatar[_0xc5bf[11]][k][_0xc5bf[17]],tipo:avatar[_0xc5bf[11]][k][_0xc5bf[18]],height:120,width:120,draggable:true,offset:[60,60],startScale:scale});caraWebInsert=false;} ;if(avatar[_0xc5bf[11]][k][_0xc5bf[12]]===_0xc5bf[19]){insertarPieza(_0xc5bf[19],avatar[_0xc5bf[11]][k].AvatarImg,{x:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[14]]),y:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[15]]),rotation:parseFloat(avatar[_0xc5bf[11]][k][_0xc5bf[16]]),id:avatar[_0xc5bf[11]][k][_0xc5bf[17]],tipo:avatar[_0xc5bf[11]][k][_0xc5bf[18]],height:320,width:200,draggable:true,offset:[100,160],startScale:scale});} ;if(avatar[_0xc5bf[11]][k][_0xc5bf[12]]==_0xc5bf[20]){insertarPieza(_0xc5bf[20],avatar[_0xc5bf[11]][k].AvatarImg,{x:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[14]]),y:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[15]]),rotation:parseFloat(avatar[_0xc5bf[11]][k][_0xc5bf[16]]),id:avatar[_0xc5bf[11]][k][_0xc5bf[17]],tipo:avatar[_0xc5bf[11]][k][_0xc5bf[18]],height:22,width:95,draggable:true,offset:[47,11],startScale:scale});} ;if(avatar[_0xc5bf[11]][k][_0xc5bf[12]]==_0xc5bf[21]){insertarPieza(_0xc5bf[21],avatar[_0xc5bf[11]][k].AvatarImg,{x:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[14]]),y:parseInt(avatar[_0xc5bf[11]][k][_0xc5bf[15]]),rotation:parseFloat(avatar[_0xc5bf[11]][k][_0xc5bf[16]]),id:avatar[_0xc5bf[11]][k][_0xc5bf[17]],tipo:avatar[_0xc5bf[11]][k][_0xc5bf[18]],height:22,width:95,draggable:true,offset:[47,11],startScale:scale});} ;} ;if(avatar[_0xc5bf[23]][_0xc5bf[22]]&&caraWebInsert){confCaraWeb[_0xc5bf[24]]=avatar[_0xc5bf[23]][_0xc5bf[22]];insertarPieza(_0xc5bf[23],avatar[_0xc5bf[23]][_0xc5bf[22]],confCaraWeb);} ;for(var a in avatar[_0xc5bf[25]]){insertarAccesorio(avatar[_0xc5bf[25]][a][_0xc5bf[26]],{x:parseInt(avatar[_0xc5bf[25]][a][_0xc5bf[14]]),y:parseInt(avatar[_0xc5bf[25]][a][_0xc5bf[15]]),rotation:parseFloat(avatar[_0xc5bf[25]][a][_0xc5bf[16]]),id:parseInt(avatar[_0xc5bf[25]][a][_0xc5bf[27]]),tipo:1,height:160,width:160,draggable:true,offset:[80,80],startScale:scale});} ;stagePersonaje[_0xc5bf[28]](layerPersonaje);$(_0xc5bf[36])[_0xc5bf[35]](_0xc5bf[2],function (_0xd353x1c){var _0xd353x1d=$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[24])[_0xc5bf[30]](_0xc5bf[29]);confCara[_0xc5bf[24]]=_0xd353x1d[0];insertarPieza(_0xc5bf[13],$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[34]),confCara);} );$(_0xc5bf[37])[_0xc5bf[35]](_0xc5bf[2],function (_0xd353x1c){var _0xd353x1d=$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[24])[_0xc5bf[30]](_0xc5bf[29]);confCuerpo[_0xc5bf[24]]=_0xd353x1d[0];insertarPieza(_0xc5bf[19],$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[34]),confCuerpo);} );$(_0xc5bf[38])[_0xc5bf[35]](_0xc5bf[2],function (_0xd353x1c){var _0xd353x1d=$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[24])[_0xc5bf[30]](_0xc5bf[29]);confAccesorio[_0xc5bf[24]]=_0xd353x1d[0];insertarAccesorio($(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[34]),confAccesorio);} );$(_0xc5bf[39])[_0xc5bf[35]](_0xc5bf[2],function (_0xd353x1c){var _0xd353x1d=$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[24])[_0xc5bf[30]](_0xc5bf[29]);confBoca[_0xc5bf[24]]=_0xd353x1d[0];insertarPieza(_0xc5bf[21],$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[34]),confBoca);} );$(_0xc5bf[40])[_0xc5bf[35]](_0xc5bf[2],function (_0xd353x1c){var _0xd353x1d=$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[24])[_0xc5bf[30]](_0xc5bf[29]);confOjos[_0xc5bf[24]]=_0xd353x1d[0];insertarPieza(_0xc5bf[20],$(this)[_0xc5bf[33]](_0xc5bf[32])[_0xc5bf[31]](_0xc5bf[34]),confOjos);} );function insertarPieza(_0xd353x1f,_0xd353x20,_0xd353x21){var _0xd353x22;_0xd353x20=_0xd353x20[_0xc5bf[42]](/^.*\/(?=[^\/]*$)/,_0xc5bf[41]);if(_0xd353x1f===_0xc5bf[13]){_0xd353x22=_0xd353x1f;_0xd353x1f=cara;if(cara_web){cara_web[_0xc5bf[43]]();removeCaraWeb();} ;} ;if(_0xd353x1f===_0xc5bf[23]){_0xd353x22=_0xd353x1f;_0xd353x1f=cara_web;_0xd353x21[_0xc5bf[24]]=_0xd353x20;if(cara){cara[_0xc5bf[43]]();} ;} ;if(_0xd353x1f===_0xc5bf[19]){_0xd353x22=_0xd353x1f;_0xd353x1f=cuerpo;} ;if(_0xd353x1f===_0xc5bf[20]){_0xd353x22=_0xd353x1f;_0xd353x1f=ojos;} ;if(_0xd353x1f===_0xc5bf[21]){_0xd353x22=_0xd353x1f;_0xd353x1f=boca;} ;if(_0xd353x1f){_0xd353x21[_0xc5bf[44]]=_0xd353x1f[_0xc5bf[45]][_0xc5bf[44]];_0xd353x21[_0xc5bf[46]]=_0xd353x1f[_0xc5bf[45]][_0xc5bf[46]];_0xd353x1f[_0xc5bf[43]]();} ;var _0xd353x23= new Image();_0xd353x21[_0xc5bf[47]]=_0xd353x23;_0xd353x23[_0xc5bf[48]]=function (){_0xd353x21[_0xc5bf[49]]=this[_0xc5bf[49]];_0xd353x21[_0xc5bf[50]]=this[_0xc5bf[50]];_0xd353x1f= new Kinetic.Image(_0xd353x21);layerPersonaje[_0xc5bf[28]](_0xd353x1f);if(_0xd353x22===_0xc5bf[13]){cara=_0xd353x1f;cara[_0xc5bf[51]]();} ;if(_0xd353x22===_0xc5bf[19]){cuerpo=_0xd353x1f;cuerpo[_0xc5bf[51]]();} ;if(_0xd353x22===_0xc5bf[20]){ojos=_0xd353x1f;} ;if(_0xd353x22===_0xc5bf[21]){boca=_0xd353x1f;} ;if(_0xd353x22===_0xc5bf[23]){cara_web=_0xd353x1f;cara_web[_0xc5bf[51]]();} ;_0xd353x1f[_0xc5bf[35]](_0xc5bf[52],function (){if(!currentSelected){this[_0xc5bf[3]](_0xc5bf[53]);this[_0xc5bf[4]](1);return layerPersonaje[_0xc5bf[5]]();} ;} );_0xd353x1f[_0xc5bf[35]](_0xc5bf[54],function (){if(!currentSelected){this[_0xc5bf[3]](null);this[_0xc5bf[4]](0);} ;return layerPersonaje[_0xc5bf[5]]();} );_0xd353x1f[_0xc5bf[35]](_0xc5bf[2],function (){if(currentSelected){currentSelected[_0xc5bf[3]](null);currentSelected[_0xc5bf[4]](0);} ;currentSelected=this;currentSelected[_0xc5bf[3]](_0xc5bf[53]);currentSelected[_0xc5bf[4]](1);if(currentSelected[_0xc5bf[45]][_0xc5bf[55]]==1||currentSelected[_0xc5bf[45]][_0xc5bf[55]]==3||currentSelected[_0xc5bf[45]][_0xc5bf[55]]==4){currentSelected[_0xc5bf[51]]();} ;layerPersonaje[_0xc5bf[5]]();} );_0xd353x1f[_0xc5bf[35]](_0xc5bf[56],function (){if(currentSelected){currentSelected[_0xc5bf[3]](null);currentSelected[_0xc5bf[4]](0);} ;currentSelected=this;currentSelected[_0xc5bf[3]](_0xc5bf[53]);currentSelected[_0xc5bf[4]](1);layerPersonaje[_0xc5bf[5]]();if(trans){trans[_0xc5bf[57]]();} ;return this[_0xc5bf[59]]({scale:{x:this[_0xc5bf[45]][_0xc5bf[58]]*scaleUpFactor,y:this[_0xc5bf[45]][_0xc5bf[58]]*scaleUpFactor}});} );_0xd353x1f[_0xc5bf[35]](_0xc5bf[60],function (){if(currentSelected[_0xc5bf[45]][_0xc5bf[55]]==2||currentSelected[_0xc5bf[45]][_0xc5bf[55]]==3||currentSelected[_0xc5bf[45]][_0xc5bf[55]]==4){currentSelected[_0xc5bf[51]]();} ;console[_0xc5bf[62]](this[_0xc5bf[61]]());trans=this[_0xc5bf[64]]({duration:0.5,easing:_0xc5bf[63],scale:{x:this[_0xc5bf[45]][_0xc5bf[58]],y:this[_0xc5bf[45]][_0xc5bf[58]]}});layerPersonaje[_0xc5bf[5]]();} );_0xd353x1f[_0xc5bf[65]](_0xc5bf[2]);layerPersonaje[_0xc5bf[5]]();} ;console[_0xc5bf[62]](_0xd353x20);if(_0xd353x22===_0xc5bf[13]){_0xd353x23[_0xc5bf[34]]=BaseUrl+_0xc5bf[66]+_0xd353x20;} ;if(_0xd353x22===_0xc5bf[19]){_0xd353x23[_0xc5bf[34]]=BaseUrl+_0xc5bf[67]+_0xd353x20;} ;if(_0xd353x22===_0xc5bf[20]){_0xd353x23[_0xc5bf[34]]=BaseUrl+_0xc5bf[68]+_0xd353x20;} ;if(_0xd353x22===_0xc5bf[21]){_0xd353x23[_0xc5bf[34]]=BaseUrl+_0xc5bf[69]+_0xd353x20;} ;if(_0xd353x22===_0xc5bf[23]){_0xd353x23[_0xc5bf[34]]=BaseUrl+_0xc5bf[70]+_0xd353x20;} ;} ;function insertarAccesorio(_0xd353x20,_0xd353x21){var _0xd353x25=true;for(i=0;i<accesorios[_0xc5bf[10]];i++){if(accesorios[i][_0xc5bf[45]][_0xc5bf[24]]==_0xd353x21[_0xc5bf[24]]){_0xd353x25=false;} ;} ;if(_0xd353x25){imageAccesorio= new Image();_0xd353x21[_0xc5bf[47]]=imageAccesorio;imageAccesorio[_0xc5bf[48]]=function (){_0xd353x21[_0xc5bf[49]]=this[_0xc5bf[49]];_0xd353x21[_0xc5bf[50]]=this[_0xc5bf[50]];accesorio= new Kinetic.Image(_0xd353x21);accesorio[_0xc5bf[35]](_0xc5bf[52],function (){if(!currentSelected){this[_0xc5bf[3]](_0xc5bf[53]);this[_0xc5bf[4]](1);return layerPersonaje[_0xc5bf[5]]();} ;} );accesorio[_0xc5bf[35]](_0xc5bf[54],function (){if(!currentSelected){this[_0xc5bf[3]](null);this[_0xc5bf[4]](0);} ;return layerPersonaje[_0xc5bf[5]]();} );accesorio[_0xc5bf[35]](_0xc5bf[2],function (){if(currentSelected){currentSelected[_0xc5bf[3]](null);currentSelected[_0xc5bf[4]](0);} ;currentSelected=this;currentSelected[_0xc5bf[3]](_0xc5bf[53]);currentSelected[_0xc5bf[4]](1);if(currentSelected[_0xc5bf[45]][_0xc5bf[55]]==3||currentSelected[_0xc5bf[45]][_0xc5bf[55]]==4){currentSelected[_0xc5bf[51]]();} ;layerPersonaje[_0xc5bf[5]]();} );accesorio[_0xc5bf[35]](_0xc5bf[56],function (){if(currentSelected){currentSelected[_0xc5bf[3]](null);currentSelected[_0xc5bf[4]](0);} ;currentSelected=this;currentSelected[_0xc5bf[3]](_0xc5bf[53]);currentSelected[_0xc5bf[4]](1);layerPersonaje[_0xc5bf[5]]();if(trans){trans[_0xc5bf[57]]();} ;return this[_0xc5bf[59]]({scale:{x:this[_0xc5bf[45]][_0xc5bf[58]]*scaleUpFactor,y:this[_0xc5bf[45]][_0xc5bf[58]]*scaleUpFactor}});} );accesorio[_0xc5bf[35]](_0xc5bf[60],function (){if(currentSelected[_0xc5bf[45]][_0xc5bf[55]]==3||currentSelected[_0xc5bf[45]][_0xc5bf[55]]==4){currentSelected[_0xc5bf[51]]();} ;trans=this[_0xc5bf[64]]({duration:0.5,easing:_0xc5bf[63],scale:{x:this[_0xc5bf[45]][_0xc5bf[58]],y:this[_0xc5bf[45]][_0xc5bf[58]]}});layerPersonaje[_0xc5bf[5]]();} );layerPersonaje[_0xc5bf[28]](accesorio);accesorios[_0xc5bf[71]](accesorio);accesorio[_0xc5bf[65]](_0xc5bf[2]);layerPersonaje[_0xc5bf[5]]();} ;_0xd353x20=_0xd353x20[_0xc5bf[42]](/^.*\/(?=[^\/]*$)/,_0xc5bf[41]);imageAccesorio[_0xc5bf[34]]=BaseUrl+_0xc5bf[72]+_0xd353x20;return true;} ;console[_0xc5bf[62]](_0xc5bf[73]);return false;} ;saveToImage=function (){var _0xd353x26=JSON[_0xc5bf[75]](layerPersonaje[_0xc5bf[74]]());if(currentSelected){currentSelected[_0xc5bf[3]](null);currentSelected[_0xc5bf[4]](0);currentSelected=null;layerPersonaje[_0xc5bf[5]]();} ;console[_0xc5bf[62]](_0xd353x26[_0xc5bf[76]]);$(_0xc5bf[80])[_0xc5bf[79]](_0xc5bf[77],_0xc5bf[78]);$(_0xc5bf[81])[_0xc5bf[79]](_0xc5bf[77],_0xc5bf[78]);$(_0xc5bf[81])[_0xc5bf[83]](_0xc5bf[82]);stagePersonaje[_0xc5bf[91]]({mimeType:_0xc5bf[84],callback:function (_0xd353x27){var _0xd353x28={avatar:_0xd353x26[_0xc5bf[76]],img:_0xd353x27};$[_0xc5bf[90]]({type:_0xc5bf[85],url:BaseUrl+_0xc5bf[86],data:_0xd353x28,success:function (_0xd353x29){window[_0xc5bf[87]]=_0xd353x29;$(_0xc5bf[80])[_0xc5bf[79]](_0xc5bf[77],_0xc5bf[88]);$(_0xc5bf[81])[_0xc5bf[79]](_0xc5bf[77],_0xc5bf[88]);} ,error:function (_0xd353x2a){console[_0xc5bf[62]](_0xc5bf[89]);$(_0xc5bf[80])[_0xc5bf[79]](_0xc5bf[77],_0xc5bf[88]);$(_0xc5bf[81])[_0xc5bf[79]](_0xc5bf[77],_0xc5bf[88]);} });} });return false;} ;angle=0.34906585;newangle=null;removeCaraWeb=function (){$[_0xc5bf[90]]({type:_0xc5bf[85],url:BaseUrl+_0xc5bf[92],success:function (_0xd353x2a){} ,error:function (_0xd353x2a){console[_0xc5bf[62]](_0xc5bf[93]);} });} ;removeImage=function (){for(i=0;i<accesorios[_0xc5bf[10]];i++){if(accesorios[i][_0xc5bf[45]][_0xc5bf[24]]==currentSelected[_0xc5bf[45]][_0xc5bf[24]]){o=accesorios[_0xc5bf[94]](currentSelected);delete accesorios[o];accesorios[_0xc5bf[95]](o,o+1);} ;} ;if(currentSelected[_0xc5bf[45]][_0xc5bf[55]]==2){removeCaraWeb();} ;currentSelected[_0xc5bf[43]]();layerPersonaje[_0xc5bf[5]]();return false;} ;rotateLeft=function (){newangle=currentSelected[_0xc5bf[96]]()-angle;console[_0xc5bf[62]](newangle);console[_0xc5bf[62]](angle);currentSelected[_0xc5bf[64]]({rotation:newangle,duration:0.2,easing:_0xc5bf[97]});layerPersonaje[_0xc5bf[5]]();return false;} ;rotateRight=function (){newangle=currentSelected[_0xc5bf[96]]()+angle;console[_0xc5bf[62]](newangle);console[_0xc5bf[62]](angle);currentSelected[_0xc5bf[64]]({rotation:newangle,duration:0.2,easing:_0xc5bf[97]});layerPersonaje[_0xc5bf[5]]();return false;} ;sendFront=function (){currentSelected[_0xc5bf[98]]();layerPersonaje[_0xc5bf[5]]();return false;} ;sendBack=function (){currentSelected[_0xc5bf[99]]();layerPersonaje[_0xc5bf[5]]();return false;} ;resetRotation=function (){currentSelected[_0xc5bf[64]]({rotation:0,duration:0.3});layerPersonaje[_0xc5bf[5]]();return false;} ;$(_0xc5bf[100])[_0xc5bf[35]](_0xc5bf[2],saveToImage);$(_0xc5bf[101])[_0xc5bf[35]](_0xc5bf[2],rotateLeft);$(_0xc5bf[102])[_0xc5bf[35]](_0xc5bf[2],rotateRight);$(_0xc5bf[103])[_0xc5bf[35]](_0xc5bf[2],sendFront);$(_0xc5bf[104])[_0xc5bf[35]](_0xc5bf[2],removeImage);$(_0xc5bf[105])[_0xc5bf[35]](_0xc5bf[2],resetRotation);$(_0xc5bf[106])[_0xc5bf[35]](_0xc5bf[2],sendBack);$(document)[_0xc5bf[112]](function (){$(_0xc5bf[109])[_0xc5bf[108]]({animate:!0,animationSpeed:150,tabActiveClass:_0xc5bf[107],updateHash:!1});$(_0xc5bf[111])[_0xc5bf[110]]({preload:!1,slideSpeed:450,generatePagination:!1,generateNextPrev:!1});} );
  
',CClientScript::POS_END);

?>