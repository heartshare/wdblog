<?php
$this->breadcrumbs=array(
	'Attachments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Attachments','url'=>array('index')),
	array('label'=>'Create Attachments','url'=>array('create')),
);?>

<h1>Manage Attachments</h1>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'attachments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'object_id',
		'filename',
		'oldfilename',
		'extension',
		/*
		'filesize',
		'filepath',
		'created',
		'updated',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
