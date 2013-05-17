
<h2>Resumen</h2>

<div style="float:'left';">
	<a href="<?php echo CController::createUrl('App/adminusuarios'); ?>">Usuarios Admin</a>
</div>
<div style="float:'left';">
	<a href="<?php echo CController::createUrl('App/admincomics'); ?>">Comics Admin</a>
</div>
<div style="float:'right';">
	<a href="<?php echo CController::createUrl('app/admin').'/admin/salir'; ?>">Salir</a>
</div>


<br><br>
<label>Numero de Usuarios: <?php echo Usuarios::model()->count(); ?></label><br>
<label>Numero de Nuevos Usuarios: <?php echo ActividadUsuario::model()->count(); ?></label><br>
<label>Numero de Comics: <?php echo Comics::model()->count(); ?></label><br>
<label>Numero de Comics Compartidos en total: <?php echo Comics::TotalCompartidos(); ?></label><br>

