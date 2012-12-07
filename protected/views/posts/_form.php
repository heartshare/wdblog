<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'excerpt',array('rows'=>4, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->markdownEditorRow($model,'content',array('rows'=>6, 'cols'=>60, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListRow($model,'post_status',array('1'=>'span5')); ?>

	<?php echo $form->toggleButtonRow($model,'comment_status'); ?>

	<?php echo $form->toggleButtonRow($model,'ping_status'); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
