<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model,'seoForm'=>$seoForm)); ?>