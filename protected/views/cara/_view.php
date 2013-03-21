<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cara')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cara), array('view', 'id'=>$data->id_cara)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cara')); ?>:</b>
	<?php echo CHtml::encode($data->TipoCara->tipo_cara); ?>
	<br />


</div>