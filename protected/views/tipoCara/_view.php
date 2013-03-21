<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cara')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_cara), array('view', 'id'=>$data->id_tipo_cara)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_cara')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_cara); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('css')); ?>:</b>
	<?php echo CHtml::encode($data->css); ?>
	<br />


</div>