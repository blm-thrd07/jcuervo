<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_ropa'); ?>
		<?php echo $form->textField($model,'id_tipo_ropa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_ropa'); ?>
		<?php echo $form->textField($model,'tipo_ropa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->