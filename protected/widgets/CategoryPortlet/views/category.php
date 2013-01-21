<ul>
<?php
foreach ($data as $value)
{
    $slug = $value['slug'] ? $value['slug'] :$value['name'];
    echo CHtml::openTag('li');
    echo CHtml::link(CHtml::encode($value['name'])."(".$value['total'].")", array($route,'category_id'=>$value['term_id'] ,'category'=>str_replace(' ','-',  trim($slug))),array('id'=>'category_'.$value['term_id']));
    echo CHtml::closeTag('li');
}
?>
</ul>