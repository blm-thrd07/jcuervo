<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cara-web-form',
	'enableAjaxValidation'=>false,
)); ?>

<style type="text/css">
	.espacio_camara{
		background-color: orange;	height: auto;
	}

</style>

<div id="upload_results">
	<div class="grid_3 espacio_camara alpha"></div>

	<div>
		<input type="button" value="Parámetros" onClick="webcam.configure()" > <br>
		<input type="button" value="Tomar foto" onClick="webcam.freeze()" > <br>
		<input type="button" value="Guardar" onClick="do_upload()" > <br>
		<input type="button" value="Otra vez" onClick="webcam.reset()" > 
	</div>

    

<div class="form">

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar_id'); ?>
		<?php echo $form->textField($model,'avatar_id'); ?>
		<?php echo $form->error($model,'avatar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>

  
<script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
<script language="JavaScript">

	var  visible=0; 
	$(".espacio_camara").before(webcam.get_html(320, 250));
	//webcam.set_api_url("/jcuervo/index.php/CaraWeb/SaveFoto");
	//webcam.set_quality( 90 ); // JPEG quality (1 -100)
	//webcam.set_shutter_sound( true ); // play shutter click sound

	webcam.set_hook( 'onComplete', 'my_completion_handler' );
	function do_upload() {
		// upload to server
		document.getElementById('upload_results').innerHTML = '<h1>Guardando foto...</h1>';
		webcam.upload();
	}
	function my_completion_handler(msg) {
		// extract URL out of PHP output
		if (msg.match(/(http\:\/\/\S+)/)) {
			var image_url = RegExp.$1;
			// show JPEG image in page
			document.getElementById('upload_results').innerHTML = '<img src="' + image_url + '" width="200" heigth="200" >';
			// reset camera for another shot
			webcam.reset();
		}
		else {
	document.getElementById('upload_results').innerHTML = '<img src="' + msg + '" width="200" heigth="200" >';

		};
	}
</script>
