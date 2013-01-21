<ul>
<?php foreach ($data as $v): ?>
<li>
<?php echo CHtml::link($v['year'].$this->year . $v['month'].$this->month."(".$v['posts'].")",
    array($route,
         'year'=>$v['year'],
         'month'=>$v['month'],
        ));  ?>
</li>
<?php endforeach; ?>
</ul>