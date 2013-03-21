<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-cara-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_cara'); ?>
		<?php echo $form->textField($model,'tipo_cara',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tipo_cara'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'css'); ?>
		<?php echo $form->textField($model,'css',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'css'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->