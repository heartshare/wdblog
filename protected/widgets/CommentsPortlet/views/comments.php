<ul>
	<?php foreach($data as $comment): ?>
	<li><?php echo $comment->authorLink; ?> on
		<?php echo CHtml::link(CHtml::encode($comment->posts->title), $comment->getUrl()); ?>
	</li>
	<?php endforeach; ?>
</ul>