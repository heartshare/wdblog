<?php
$this->breadcrumbs=array(
	Yii::t('frontend','Posts')=>array('index'),
	Yii::t('frontend', 'Create'),
);
?>

<h1><?php echo Yii::t('frontend','Create'),Yii::t('frontend','Posts')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'seoForm'=>$seoForm,'terms'=>$terms)); ?>