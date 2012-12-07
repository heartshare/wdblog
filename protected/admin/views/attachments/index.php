<?php
$this->breadcrumbs=array(
	'Attachments',
);

$this->menu=array(
	array('label'=>'Create Attachments','url'=>array('create')),
	array('label'=>'Manage Attachments','url'=>array('admin')),
);
?>

<h1>Attachments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
