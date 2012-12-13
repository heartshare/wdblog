<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Manage',
);
?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'posts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'template' => "{items}",
	'columns'=>array(
		'id',
		'title',
        array(
			'name'=>'post_status',
			'value'=>'Lookup::item("PostStatus",$data->post_status)',
			'filter'=>Lookup::items('PostStatus'),
		),
		'created',
		'updated',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
