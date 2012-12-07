<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'List Users','url'=>array('index')),
);
?>

<h1>Users</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
