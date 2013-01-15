<?php
foreach($tags as $tag=>$weight)
{
    $link=CHtml::link(CHtml::encode($tag), array($route,'tag'=>str_replace(' ','-',  trim($tag))));
    echo CHtml::tag('span', array(
        'class'=>'tag',
        'style'=>"font-size:{$weight}pt",
    ), $link)."\n";
}