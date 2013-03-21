<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ropa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'complexion'); ?>
		<?php echo ZHtml::enumDropDownList( $model,'complexion' ); ?>
		<?php echo $form->error($model,'complexion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_ropa'); ?>
		<?php echo $form->dropDownList($model,'id_tipo_ropa', CHtml::listData(TipoRopa::model()->findAll(), 'id_tipo_ropa', 'tipo_ropa'), array('empty'=>'Selecciona')); ?>
		<?php echo $form->error($model,'id_tipo_ropa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->