<?php
/* @var $this CommentsController */
/* @var $model Comments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>64,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_email'); ?>
		<?php echo $form->textField($model,'author_email',array('size'=>60,'maxlength'=>255,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'author_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_url'); ?>
		<?php echo $form->textField($model,'author_url',array('size'=>60,'maxlength'=>255,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'author_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>60,'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->