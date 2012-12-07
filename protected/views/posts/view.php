<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Posts','url'=>array('index')),
	array('label'=>'Create Posts','url'=>array('create')),
	array('label'=>'Update Posts','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Posts','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Posts','url'=>array('admin')),
);
?>

<h1>View Posts #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'title',
		'excerpt',
		'content',
		'content_filtered',
		'post_status',
		'comment_status',
		'ping_status',
		'password',
		'read_count',
		'post_type',
		'to_ping',
		'pinged',
		'parent_id',
		'menu_order',
		'slug',
		'created',
		'update',
	),
)); ?>
