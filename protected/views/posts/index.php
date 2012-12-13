<?php
$this->breadcrumbs=array(
	Yii::t('frontend', 'Posts'),
    
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
