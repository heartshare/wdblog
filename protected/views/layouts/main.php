<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=utf-8;"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="shortcut icon" type=image/x-icon href="favicon.ico">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="body">
<div class="container-fluid" id="page">
    <div id="header">
        <div id="site-description" class="right"><h2>Wdblog is an Yii-powered open source blog project</h2></div>
        <div id="logo"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
        <div class="clearfix"></div>
    </div><!-- header -->
    <div id="banner">
    
    </div>
    <div id="mainmenu">
            <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                            array('label'=>Yii::t('frontend', 'Home'), 'url'=>array('/posts/index')),
                            array('label'=>Yii::t('frontend', 'About Me'), 'url'=>array('/site/page', 'view'=>'about')),
                            array('label'=>Yii::t('frontend', 'Contact Us'), 'url'=>array('/site/contact')),
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
