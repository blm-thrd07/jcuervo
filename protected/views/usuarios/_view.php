<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_facebook')); ?>:</b>
	<?php echo CHtml::encode($data->id_facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_album')); ?>:</b>
	<?php echo CHtml::encode($data->id_album); ?>
	<br />


</div>