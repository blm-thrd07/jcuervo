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
  var BaseUrl = "/php2/jcuervo"; 
 eval(function(p,a,c,k,e,r){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!"".replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return"\\w+"};c=1};while(c--)if(k[c])p=p.replace(new RegExp("\\b"+e(c)+"\\b","g"),k[c]);return p}("z v=[];z 31=[];z 17,H,E,R,U,X,2y,7,j,2o,Y,1H,1F,1S,1C,1B,12,1L,s,r,Z;1Q=D;7=G;s=1;1i=1.2U;Z=G;12=1c 1E.2V({2W:"2X",w:3b,u:3e});j=1c 1E.3h();12.3k().3l("t",g(a){8(7){7.C(G);7.B(0);7=G;j.q()}});15=12.2x()/2;14=12.3x()/2;s=1;1Z={x:15,y:14-2m,u:1l,w:1l,J:D,K:[1a,1a],r:s,n:2};1X={x:15,y:14-2m,u:1A,w:1A,J:D,K:[1a,1a],r:s,n:3};1W={x:15,y:14+34,u:24,w:2a,J:D,K:[1l,13],r:s,n:4};1U={x:15,y:14-13,u:22,w:1o,J:D,K:[1p,11],r:s,n:5};1T={x:15,y:14-33,u:22,w:1o,J:D,K:[1p,11],r:s,n:6};20={x:15,y:14-1l,u:13,w:13,J:D,K:[1x,1x],r:s,n:1};1y(z k=0;k<f.h.1R;k++){8(f.h[k].1D==="H"){S("H",f.h[k].1G,{x:L(f.h[k].1k),y:L(f.h[k].1h),F:1d(f.h[k].F),p:f.h[k].1q,n:f.h[k].1J,u:1A,w:1A,J:D,K:[1a,1a],r:s});1Q=T}8(f.h[k].1D==="R"){S("R",f.h[k].1G,{x:L(f.h[k].1k),y:L(f.h[k].1h),F:1d(f.h[k].F),p:f.h[k].1q,n:f.h[k].1J,u:24,w:2a,J:D,K:[1l,13],r:s})}8(f.h[k].1D=="U"){S("U",f.h[k].1G,{x:L(f.h[k].1k),y:L(f.h[k].1h),F:1d(f.h[k].F),p:f.h[k].1q,n:f.h[k].1J,u:22,w:1o,J:D,K:[1p,11],r:s})}8(f.h[k].1D=="X"){S("X",f.h[k].1G,{x:L(f.h[k].1k),y:L(f.h[k].1h),F:1d(f.h[k].F),p:f.h[k].1q,n:f.h[k].1J,u:22,w:1o,J:D,K:[1p,11],r:s})}}8(f.E.1g&&1Q){1Z.p=f.E.1g;S("E",f.E.1g,1Z)}1y(z a 2T f.v){1O(f.v[a].2M,{x:L(f.v[a].1k),y:L(f.v[a].1h),F:1d(f.v[a].F),p:L(f.v[a].2L),n:1,u:13,w:13,J:D,K:[1x,1x],r:s})}12.1N(j);$("#2K .1n").m("t",g(e){z a=$(9).O("I").Q("p").1m("-");1X.p=a[0];S("H",$(9).O("I").Q("M"),1X)});$("#2J .1n").m("t",g(e){z a=$(9).O("I").Q("p").1m("-");1W.p=a[0];S("R",$(9).O("I").Q("M"),1W)});$("#2I .1n").m("t",g(e){z a=$(9).O("I").Q("p").1m("-");20.p=a[0];1O($(9).O("I").Q("M"),20)});$("#2H .1n").m("t",g(e){z a=$(9).O("I").Q("p").1m("-");1T.p=a[0];S("X",$(9).O("I").Q("M"),1T)});$("#2z .1n").m("t",g(e){z a=$(9).O("I").Q("p").1m("-");1U.p=a[0];S("U",$(9).O("I").Q("M"),1U)});g S(a,b,c){z d;b=b.2p(/^.*\\/(?=[^\\/]*$)/,"");8(a==="H"){d=a;a=H;8(E){E.1z();1M()}}8(a==="E"){d=a;a=E;c.p=b;8(H)H.1z()}8(a==="R"){d=a;a=R}8(a==="U"){d=a;a=U}8(a==="X"){d=a;a=X}8(a){c.x=a.l.x;c.y=a.l.y;a.1z()}z e=1c 1t();c.1P=e;e.27=g(){c.w=9.w;c.u=9.u;a=1c 1E.1t(c);j.1N(a);8(d==="H"){H=a;H.16()}8(d==="R"){R=a;R.16()}8(d==="U"){U=a}8(d==="X"){X=a}8(d==="E"){E=a;E.16()}a.m("29",g(){8(!7){9.C("18");9.B(1);A j.q()}});a.m("2c",g(){8(!7){9.C(G);9.B(0)}A j.q()});a.m("t",g(){8(7){7.C(G);7.B(0)}7=9;7.C("18");7.B(1);8(7.l.n==1||7.l.n==3||7.l.n==4){7.16()}j.q()});a.m("2d",g(){8(7){7.C(G);7.B(0)}7=9;7.C("18");7.B(1);j.q();8(Z){Z.2i()}A 9.2f({s:{x:9.l.r*1i,y:9.l.r*1i}})});a.m("2g",g(){8(7.l.n==2||7.l.n==3||7.l.n==4){7.16()}N.P(9.2s());Z=9.1e({1j:0.5,1w:"2n-1I-1r",s:{x:9.l.r,y:9.l.r}});j.q()});a.2q("t");j.q()};N.P(b);8(d==="H"){e.M=10+"/1f/2t/"+b}8(d==="R"){e.M=10+"/1f/2u/"+b}8(d==="U"){e.M=10+"/1f/U/"+b}8(d==="X"){e.M=10+"/1f/2v/"+b}8(d==="E"){e.M=10+"/2w/"+b}};g 1O(a,b){z c=D;1y(i=0;i<v.1R;i++){8(v[i].l.p==b.p)c=T}8(c){1v=1c 1t();b.1P=1v;1v.27=g(){b.w=9.w;b.u=9.u;V=1c 1E.1t(b);V.m("29",g(){8(!7){9.C("18");9.B(1);A j.q()}});V.m("2c",g(){8(!7){9.C(G);9.B(0)}A j.q()});V.m("t",g(){8(7){7.C(G);7.B(0)}7=9;7.C("18");7.B(1);8(7.l.n==3||7.l.n==4){7.16()}j.q()});V.m("2d",g(){8(7){7.C(G);7.B(0)}7=9;7.C("18");7.B(1);j.q();8(Z){Z.2i()}A 9.2f({s:{x:9.l.r*1i,y:9.l.r*1i}})});V.m("2g",g(){8(7.l.n==3||7.l.n==4){7.16()}Z=9.1e({1j:0.5,1w:"2n-1I-1r",s:{x:9.l.r,y:9.l.r}});j.q()});j.1N(V);v.2A(V);V.2q("t");j.q()}a=a.2p(/^.*\\/(?=[^\\/]*$)/,"");1v.M=10+"/1f/v/"+a;A D}N.P("2B 2C 2D");A T};1S=g(){z d=2E.2F(j.2G());8(7){7.C(G);7.B(0);7=G;j.q()}N.P(d.2j);$("#1K").19("1b","2k");$("#1u").19("1b","2k");$("#1u").2N("2O");12.2P({2Q:"1P/2R",2S:g(b){z c={f:d.2j,I:b};$.2e({23:"28",1g:10+"26.25/2Y/2Z",30:c,2l:g(a){2r.32=a;$("#1K").19("1b","1s");$("#1u").19("1b","1s")},1V:g(a){N.P("35 36 1V 37 38 :(");$("#1K").19("1b","1s");$("#1u").19("1b","1s")},})}});A T};17=0.39;Y=G;1M=g(){$.2e({23:"28",1g:10+"26.25/3a/21",2l:g(a){},1V:g(a){N.P("3c 3d")},})}1L=g(){1y(i=0;i<v.1R;i++){8(v[i].l.p==7.l.p){o=v.3f(7)21 v[o];v.3g(o,o+1)}}8(7.l.n==2){1M()}7.1z();j.q();A T}1H=g(){Y=7.2h()-17;N.P(Y);N.P(17);7.1e({F:Y,1j:0.2,1w:"1I-1r"});j.q();A T};1F=g(){Y=7.2h()+17;N.P(Y);N.P(17);7.1e({F:Y,1j:0.2,1w:"1I-1r",});j.q();A T};1B=g(){7.3i();j.q();A T};1C=g(){7.3j();j.q();A T};1Y=g(){7.1e({F:0,1j:0.3,});j.q();A T};$("#W-2o").m("t",1S);$("#W-1H").m("t",1H);$("#W-1F").m("t",1F);$("#W-1B").m("t",1B);$("#W-3m").m("t",1L);$("#W-1Y").m("t",1Y);$("#W-1C").m("t",1C);$(3n).3o(g(){$(".W-3p").3q({3r:!0,3s:3t,3u:"3v",3w:!1});$(".W-2b").2b({3y:!1,3z:3A,3B:!1,3C:!1})});",62,225,"|||||||currentSelected|if|this||||||avatar|function|avatarPiezas||layerPersonaje||attrs|on|tipo||id|draw|startScale|scale|click|height|accesorios|width|||var|return|setStrokeWidth|setStroke|true|cara_web|rotation|null|cara|img|draggable|offset|parseInt|src|console|find|log|attr|cuerpo|insertarPieza|false|ojos|accesorio|js|boca|newangle|trans|BaseUrl||stagePersonaje|160|halfy|halfx|moveToBottom|angle|980d2e|css|60|display|new|parseFloat|transitionTo|images|url|posy|scaleUpFactor|duration|posx|100|split|itemMeme|95|47|piezaid|out|none|Image|popup|imageAccesorio|easing|80|for|remove|120|sendFront|sendBack|descripcion|Kinetic|rotateRight|AvatarImg|rotateLeft|ease|tipo_pieza_id|overlay|removeImage|removeCaraWeb|add|insertarAccesorio|image|caraWebInsert|length|saveToImage|confBoca|confOjos|error|confCuerpo|confCara|resetRotation|confCaraWeb|confAccesorio|delete||type|320|php|index|onload|POST|mouseover|200|slides|mouseout|dragstart|ajax|setAttrs|dragend|getRotation|stop|children|block|success|170|elastic|listenerStat|replace|fire|window|getZIndex|cabezas|cuerpos|bocas|AvatarCaras|getWidth|currentLayer|tab3|push|NO|SE|INSERTO|JSON|parse|toJSON|tab4|tab5|tab2|tab1|accesorios_id|accesorioImg|fadeIn|slow|toDataURL|mimeType|png|callback|in|05|Stage|container|personajeCanvas|avatars|UpdatePieza|data|piezas|location|140|50|hubo|un|al|guardar|34906585|CaraWeb|258|no|eliminado|460|indexOf|splice|Layer|moveUp|moveDown|getContainer|addEventListener|removeElement|document|ready|tabEngine|easytabs|animate|animationSpeed|150|tabActiveClass|selected|updateHash|getHeight|preload|slideSpeed|450|generatePagination|generateNextPrev".split("|"),0,{}))
  
',CClientScript::POS_END);

?>