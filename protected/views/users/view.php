<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Users','url'=>array('index')),
	array('label'=>'Update Users','url'=>array('update','id'=>$model->id)),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'nickname',
		'avatar',
		'email',
		'role',
		'user_url',
		'other_details',
		'created',
		'updated',
	),
)); ?>
