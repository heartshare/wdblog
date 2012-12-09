<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

?>

<div class="post">
    <div class="title">
		<h1><?php echo CHtml::link(CHtml::encode($model->title), $model->url); ?></h1>
	</div>
    <div class="author">
		posted by <?php echo $model->author->username . ' on ' . $model->created; ?>
    </div>
    <div class="content">
       <?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                echo $model->content;
			$this->endWidget();
		?>
    </div>
    <div class="tags">
		<b>Tags:</b>
		
	</div>
</div>