<?php $this->beginContent('//layouts/main'); ?>
<div class="left" id="left-sidebar">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('frontend', 'User Menu'),
		));
    ?>
    <ul>
        <?php if(Yii::app()->user->isGuest): ?>

        <li>
            <?php $this->widget('ext.oauthLogin.OauthLogin',array(
                'itemView'=>'medium_login',
                'back_url'=>Yii::app()->homeUrl,
             )); ?>
            <?php echo CHtml::link(Yii::t('frontend','Login'),array('users/login')); ?></li>
        <?php endif; ?>
        <?php if(!Yii::app()->user->isGuest): ?>
        <li><?php echo CHtml::link(Yii::t('frontend','Create New Post'),array('posts/create')); ?></li>
        <li><?php echo CHtml::link(Yii::t('frontend','Manage Posts'),array('posts/admin')); ?></li>
        <li><?php if(!Yii::app()->user->isGuest) echo CHtml::link(Yii::app()->user->name.'('.Yii::t('frontend','Logout').')',array('users/logout')); ?></li>
        <?php endif; ?>
    </ul>
	<?php $this->endWidget(); ?>
	</div><!-- sidebar -->
</div>
<div class="span-18 last">
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>


<?php $this->endContent(); ?>