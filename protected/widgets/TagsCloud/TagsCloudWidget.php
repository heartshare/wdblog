<?php
class TagsCloudWidget extends CPortlet
{
    public $title='Tags Cloud';
	public $limit=20;
    public $route='posts/index';
    
    public function getTags()
	{
        $models = Terms::model()->findAll(array(
			'condition'=>'taxonomy=:type',
			'params'=>array(':type'=>'tags'),
		));
        $total=0;
		foreach($models as $model)
        {
			$total+=$model->count;
        }
		$tags=array();
		if($total>0)
		{
			foreach($models as $model)
            {
				$tags[$model->name]=8+(int)(16*$model->count/($total+10));
            }
			ksort($tags);
		}
		return $tags;
        
	}

	protected function renderContent()
	{
		$this->render('tags',array('tags'=>$this->getTags(),'route'=>$this->route));
	}
    
}