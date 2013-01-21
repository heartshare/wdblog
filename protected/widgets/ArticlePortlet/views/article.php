<ul>
<?php
foreach ($data as $value)
{
    $slug = $value['slug'] ? $value['slug'] :$value['title'];
    echo CHtml::openTag('li');
    echo CHtml::link(CHtml::encode($value['title']), array($route, 'id'=>$value['id'] ,'title'=>str_replace(' ','-',  trim($slug)) ));
    echo CHtml::closeTag('li');
}
?>
</ul>