<?php
$this->breadcrumbs=array(
	Yii::t('frontend', 'Posts'),
    
);

$this->menu=array(
	array('label'=>'Create Posts','url'=>array('create')),
	array('label'=>'Manage Posts','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
