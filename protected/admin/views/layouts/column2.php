<?php $this->beginContent('//layouts/main'); ?>
<div id="left-sidebar">
       <div id="sidebar">
       <?php 
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type'=>'list',
                'items'=>$this->menu,
                'items'=>array(
                    array('label'=>'LIST HEADER'),
                    array('label'=>'Home', 'icon'=>'home', 'url'=>'#', 'active'=>true),
                    array('label'=>'Library', 'icon'=>'book', 'url'=>'#'),
                    array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
                    array('label'=>'ANOTHER LIST HEADER'),
                    array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
                    array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
                    array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
                ),
            ));
       
           $this->beginWidget('zii.widgets.CPortlet', array(
               'title'=>'Operations',
           ));
           $this->widget('zii.widgets.CMenu', array(
               'items'=>$this->menu,
               'htmlOptions'=>array('class'=>'operations'),
           ));
           $this->endWidget();
       ?>
       </div><!-- sidebar -->
</div>

<div id="main-content">
        
    <div id="content">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        <?php echo $content; ?>
    </div><!-- content -->
</div>
   
<?php $this->endContent(); ?>