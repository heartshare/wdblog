<?php
$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Links','url'=>array('index')),
	array('label'=>'Create Links','url'=>array('create')),
);
?>

<h1>Manage Links</h1>

<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'links-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'link_url',
		'link_name',
		'link_image',
		'link_target',
		'link_description',
		/*
		'link_status',
		'link_owner',
		'link_rating',
		'link_rel',
		'link_notes',
		'link_rss',
		'created',
		'updated',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
