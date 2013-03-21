<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_meme'); ?>
		<?php echo $form->textField($model,'id_meme'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_background'); ?>
		<?php echo $form->textField($model,'id_background'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario_globo'); ?>
		<?php echo $form->textField($model,'comentario_globo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_zapato'); ?>
		<?php echo $form->textField($model,'id_zapato'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->