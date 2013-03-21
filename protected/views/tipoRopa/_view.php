<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_ropa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_ropa), array('view', 'id'=>$data->id_tipo_ropa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_ropa')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_ropa); ?>
	<br />


</div>