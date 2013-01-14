<?php
$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Terms','url'=>array('index')),
	array('label'=>'Create Terms','url'=>array('create')),
	array('label'=>'View Terms','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Terms','url'=>array('admin')),
);
?>

<h1>Update Tags <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>