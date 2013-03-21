<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ropa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ropa), array('view', 'id'=>$data->id_ropa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complexion')); ?>:</b>
	<?php echo CHtml::encode($data->complexion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_ropa')); ?>:</b>
	<?php echo CHtml::encode($data->TipoRopa->tipo_ropa); ?>
	<br />


</div>