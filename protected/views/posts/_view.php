<div class="post">
    <div class="title">
		<h2><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h2>
	</div>
    <div class="author">
		posted by <?php echo $data->author->username . ' on ' . $data->created; ?>
        Category :
        <?php $this->beginWidget('ext.Terms.Terms',array(
            'id'=>$data->id,
           // 'type'=>'posts',
        ));
        $this->endWidget();
        ?>
    </div>
    <div class="content">
        <?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
                echo $data->content;
			$this->endWidget();
		?>
    </div>
    <div class="tags">
		<b>Tags:</b>
		<?php $this->widget('Terms',array(
            'id'=>$data->id,
            'type'=>'tags',
        ));
        ?>
	</div>
</div>