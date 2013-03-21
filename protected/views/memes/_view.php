<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_meme')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_meme), array('view', 'id'=>$data->id_meme)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_background')); ?>:</b>
	<?php echo CHtml::encode($data->id_background); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario_globo')); ?>:</b>
	<?php echo CHtml::encode($data->comentario_globo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_zapato')); ?>:</b>
	<?php echo CHtml::encode($data->id_zapato); ?>
	<br />


</div>