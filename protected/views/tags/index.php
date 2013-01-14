<?php
$this->breadcrumbs=array(
	'Tags',
);

$this->menu=array(
	array('label'=>'Create Terms','url'=>array('create')),
	array('label'=>'Manage Terms','url'=>array('admin')),
);
?>

<h1>Tags</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
