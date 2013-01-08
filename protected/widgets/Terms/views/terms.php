<?php
    foreach ($data as $value) 
    {
        echo CHtml::link($value['name'], Yii::app()->createAbsoluteUrl('tags/view',array('id'=>$value['term_id'])),array('style'=>'padding: 0 10px;'));
    }
?>