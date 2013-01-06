<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Posts','url'=>array('index')),
	array('label'=>'Create Posts','url'=>array('create')),
);

?>

<h1>Manage Posts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'posts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
        array(
                'name'=>'user_id',
                'value'=>'Users::getUsername($data->user_id)',
                'filter'=>false,
        ),
        array(
                'name'=>'post_status',
                'value'=>'Lookup::item("PostStatus",$data->post_status)',
                'filter'=>Lookup::items('PostStatus'),
        ),
        'created',
        array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
        ),
	),
)); ?>
