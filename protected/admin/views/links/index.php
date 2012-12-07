<?php
$this->breadcrumbs=array(
	'Links',
);

$this->menu=array(
	array('label'=>'Create Links','url'=>array('create')),
	array('label'=>'Manage Links','url'=>array('admin')),
);
?>

<h1>Links</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
