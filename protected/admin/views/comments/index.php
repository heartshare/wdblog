<?php
$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create Comments','url'=>array('create')),
	array('label'=>'Manage Comments','url'=>array('admin')),
);
?>

<h1>Comments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
