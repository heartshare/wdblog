<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'excerpt',array('rows'=>5, 'cols'=>40, 'class'=>'span8')); ?>

	<?php echo $form->markdownEditorRow($model,'content',array('rows'=>6, 'cols'=>40, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'post_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'comment_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ping_status',array('class'=>'span5')); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'read_count',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>255)); ?>

    <?php echo $form->datepickerRow($model, 'created', 
          array('hint'=>'Click inside! This is a super cool date field.',
        'prepend'=>'<i class="icon-calendar"></i>',)); ?>
    

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
