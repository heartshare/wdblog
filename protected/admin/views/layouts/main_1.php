<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="zh-cn" />
	<meta name="robots" content="none" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_admin.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login_form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="containers" id="pages">
    <div id="login-form" style="margin:0 auto; padding:60px 0; width:355px;" >
	<?php echo $content; ?>
    </div>    
	<div id="footer" style="position: fixed;left:0;bottom: 0;right:0;">
		Copyright &copy; <?php echo date('Y'); ?> by WindsDeng.
		All Rights Reserved.
		Powered by <?php echo Yii::powered(); ?>
		QQ交流群:200505420
        <script type="text/javascript" src="http://js.tongji.linezing.com/2975299/tongji.js"></script>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
