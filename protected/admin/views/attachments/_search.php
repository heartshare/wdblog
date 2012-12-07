<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'users_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'object_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'filename',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'oldfilename',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'extension',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'filesize',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'filepath',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
