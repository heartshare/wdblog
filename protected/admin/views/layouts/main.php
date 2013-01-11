<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_admin.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="containers" id="page">
	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
            'type'=>'inverse', // null or 'inverse'
            'brand'=>  CHtml::encode(Yii::app()->name),
            'brandUrl'=>Yii::app()->homeUrl,
            'collapse'=>true, // requires bootstrap-responsive.css
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'items'=>array(
                        '---',
                         array('label'=>Yii::t('backend', 'Users'), 'url'=>array('/users/admin')),
                         array('label'=>Yii::t('backend', 'Posts'), 'url'=>array('/posts/admin')),
                         array('label'=>Yii::t('backend', 'Comments'), 'url'=>array('/comments/admin')),
                         array('label'=>Yii::t('backend', 'Links'), 'url'=>array('/links/admin')),
                         array('label'=>Yii::t('backend', 'Attachments'), 'url'=>array('/attachments/admin')),	
                     ),
                ),
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'items'=>array(
                        array('label'=>Yii::app()->user->nickname, 'url'=>array('users/view','id'=>Yii::app()->user->id), 
							'items'=>array(
			                    array('label'=>Yii::t('backend', 'View my profile'), 'url'=>array('users/view','id'=>Yii::app()->user->id)),
			                    array('label'=>Yii::t('backend', 'Edit account settings'), 'url'=>array('users/update','id'=>Yii::app()->user->id)),
			                    '---',
			                    array('label'=>Yii::t('backend', 'Logout'), 'url'=>array('users/logout')),
		                )),
                    ),
                ),
            ),
        )); ?>
	</div><!-- mainmenu -->

	<?php echo $content; ?>
    
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by WindsDeng.
		All Rights Reserved.
		<?php echo Yii::powered(); ?>
        QQ交流群:200505420
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
