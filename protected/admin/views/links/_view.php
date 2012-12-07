<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_url')); ?>:</b>
	<?php echo CHtml::encode($data->link_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_name')); ?>:</b>
	<?php echo CHtml::encode($data->link_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_image')); ?>:</b>
	<?php echo CHtml::encode($data->link_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_target')); ?>:</b>
	<?php echo CHtml::encode($data->link_target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_description')); ?>:</b>
	<?php echo CHtml::encode($data->link_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_status')); ?>:</b>
	<?php echo CHtml::encode($data->link_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('link_owner')); ?>:</b>
	<?php echo CHtml::encode($data->link_owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_rating')); ?>:</b>
	<?php echo CHtml::encode($data->link_rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_rel')); ?>:</b>
	<?php echo CHtml::encode($data->link_rel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_notes')); ?>:</b>
	<?php echo CHtml::encode($data->link_notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_rss')); ?>:</b>
	<?php echo CHtml::encode($data->link_rss); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>