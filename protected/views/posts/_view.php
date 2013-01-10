<div class="post">
    <div class="title">
		<h2><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h2>
	</div>
    <div class="author">
        <i class="icon-user"></i><?php echo $data->author->username;?> <i class="icon-calendar"></i><?php echo $data->created; ?>
        
        <i class="icon-th-list"></i>
        <?php $this->beginWidget('application.widgets.Terms.Terms',array(
            'id'=>$data->id,
            'type'=>'posts',
        ));
        $this->endWidget();
        ?>
        <i class="icon-eye-open"></i><?php echo $data->read_count, Yii::t('frontend', 'Views'); ?>
        <i class="icon-comment"></i><?php echo $data->commentCount, Yii::t('frontend', 'Comments');?>
        <?php if(!Yii::app()->user->isGuest && (Yii::app()->user->id == $data->user_id)): ?>
        <i class="icon-edit"></i><?php echo CHtml::link(Yii::t('frontend', 'Edit'), Yii::app()->createAbsoluteUrl('posts/update',array('id'=>$data->id)))  ; ?>
        <?php endif; ?>
    </div>
    <div class="content">
        <?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                echo $data->content;
			$this->endWidget();
		?>
    </div>
    <div class="tags">
		<i class="icon-tags"></i><b>Tags:</b>
		<?php $this->widget('application.widgets.Terms.Terms',array(
            'id'=>$data->id,
            'type'=>'tags',
        ));
        ?>
	</div>
</div>