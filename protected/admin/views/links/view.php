<?php
$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Links','url'=>array('index')),
	array('label'=>'Create Links','url'=>array('create')),
	array('label'=>'Update Links','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Links','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Links','url'=>array('admin')),
);
?>

<h1>View Links #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'link_url',
		'link_name',
		'link_image',
		'link_target',
		'link_description',
		'link_status',
		'link_owner',
		'link_rating',
		'link_rel',
		'link_notes',
		'link_rss',
		'created',
		'updated',
	),
)); ?>
