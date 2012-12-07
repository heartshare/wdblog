<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'links-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'link_url',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'link_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'link_image',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'link_target',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'link_description',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'link_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'link_owner',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'link_rating',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'link_rel',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'link_notes',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'link_rss',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
