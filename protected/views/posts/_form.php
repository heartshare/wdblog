<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="help-block"><?php echo Yii::t('frontend', 'Fields with <span class="required">*</span> are required.')?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span9','maxlength'=>255)); ?>
    
    <?php echo $form->checkBoxListInlineRow($terms,'term_id',  Terms::items('posts')); ?>
    
	<?php echo $form->markdownEditorRow($model,'content',array('rows'=>5, 'cols'=>60, 'class'=>'span9')); ?>

	<?php echo $form->dropDownListRow($model,'post_status',Lookup::items('UserPostStatus')); ?>
  
    <?php $this->widget('bootstrap.widgets.TbTabs', array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array('label' => Yii::t('frontend','Excerpt'), 'content' => $form->textAreaRow($model,'excerpt',array('rows'=>4, 'cols'=>50, 'class'=>'span9')), 'active' => true),
            array('label' => 'SEO'.Yii::t('frontend', 'Optimization'), 'content' => $form->textFieldRow($seoForm,'keywords',array('class'=>'span9','maxlength'=>255)).$form->textAreaRow($seoForm,'description',array('class'=>'span9','maxlength'=>255)).$form->textFieldRow($model,'slug',array('class'=>'span9','maxlength'=>255))),
            array('label' => Yii::t('frontend', 'Privacy'), 'content' => $form->toggleButtonRow($model,'comment_status').$form->toggleButtonRow($model,'ping_status').$form->textFieldRow($model,'password',array('class'=>'span5','maxlength'=>32))),
        ),
    )); ?>  
    
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('frontend','Create') : Yii::t('frontend','Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
			'type'=>'success',
			'label'=>Yii::t('frontend','Reset'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
