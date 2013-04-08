<style type="text/css">
	.espacio_camara{
		background-color: orange;	height: auto;
	}
	input{
		display: inline-block; width: 110px;
		float: right;
		margin-top: -250px;
		margin-right: 530px;
	}
</style>

	<div class="grid_3 espacio_camara alpha"></div>
	
	<script language="JavaScript">
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
			else alert("PHP Error: " + msg);
		}
	</script>

	<div>
		<input type="button" value="Parámetros" onClick="webcam.configure()" > <br>
		<input type="button" value="Tomar foto" onClick="webcam.freeze()" > <br>
		<input type="button" value="Guardar" onClick="do_upload()" > <br>
		<input type="button" value="Otra vez" onClick="webcam.reset()" > 
	</div>

    <div id="upload_results"></div>
 







