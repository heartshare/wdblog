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
        <i class="icon-user"></i><?php echo $model->author->username;?> <i class="icon-calendar"></i><?php echo $model->created; ?>
        
        <i class="icon-th-list"></i>
        <?php $this->beginWidget('application.widgets.Terms.Terms',array(
            'id'=>$model->id,
            'type'=>'posts',
        ));
        $this->endWidget();
        ?>
        <i class="icon-eye-open"></i><?php echo $model->read_count, Yii::t('frontend', 'Views'); ?>
        <i class="icon-comment"></i><?php echo $model->commentCount, Yii::t('frontend', 'Comments');?>
        <?php if(!Yii::app()->user->isGuest && (Yii::app()->user->id == $model->user_id)): ?>
        <i class="icon-edit"></i><?php echo CHtml::link(Yii::t('frontend', 'Edit'), Yii::app()->createAbsoluteUrl('posts/update',array('id'=>$model->id)))  ; ?>
        <?php endif; ?>
    </div>
    <div class="content">
       <?php $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                echo $model->content;
        $this->endWidget();
        ?>
    </div>
    <div class="tags">
		<i class="icon-tags"></i><b>Tags:</b>
		<?php $this->widget('application.widgets.Terms.Terms',array(
            'id'=>$model->id,
            'type'=>'tags',
        ));
        ?>
	</div>
</div>