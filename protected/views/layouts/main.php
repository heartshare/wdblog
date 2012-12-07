<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="body">

<div class="container" id="page">

	<div id="header">
        <div id="site-description" class="right"><h2>Wdblog is an Yii-powered open source blog project</h2></div>
        <div id="logo"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
        <div class="clear"></div>
    </div><!-- header -->
    <div id="banner">
        <?php $this->widget('bootstrap.widgets.TbCarousel', array(
            'displayPrevAndNext'=>false,
            'items'=>array(
                array('image'=>Yii::app()->request->baseUrl.'/attachments/sunset.jpg','imageOptions'=>array('style'=>'height:200px;width:100%'), 'label'=>'Welcome to Wdblog', 'caption'=>'Wdblog is an Yii-powered open source blog project， it was released under the terms of the BSD License.'),
            ),
        )); ?>
    </div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>Yii::t('frontend', 'Home'), 'url'=>array('/posts/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by WindsDeng.
		All Rights Reserved.
		<?php echo Yii::powered(); ?>
        QQ交流群:200505420
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
