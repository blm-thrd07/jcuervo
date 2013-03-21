<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'memes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_background'); ?>
		<?php echo $form->textField($model,'id_background'); ?>
		<?php echo $form->error($model,'id_background'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario_globo'); ?>
		<?php echo $form->textField($model,'comentario_globo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'comentario_globo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_zapato'); ?>
		<?php echo $form->textField($model,'id_zapato'); ?>
		<?php echo $form->error($model,'id_zapato'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->