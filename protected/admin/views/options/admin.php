<?php
$this->breadcrumbs=array(
	'Options'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Options','url'=>array('index')),
	array('label'=>'Create Options','url'=>array('create')),
);?>

<h1>Manage Options</h1>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'options-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'option_name',
		'option_value',
		'autoload',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
