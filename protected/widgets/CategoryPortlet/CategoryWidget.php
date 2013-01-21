<?php
class CategoryWidget extends CPortlet
{
    public $title='Categories';
	public $limit=20;
    public $route='posts/index';
    
    public function getCategory()
    {
        $sql="SELECT t.taxonomy,t.slug ,t.name,l.object_id,l.term_order,count(l.term_id) as total ,t.id as term_id  FROM {{terms}} as t left join {{term_relationships}} as l on t.id=l.term_id  where t.taxonomy ='posts'  group by l.term_id  ORDER BY l.term_order DESC LIMIT $this->limit";
        $model=Yii::app()->db->createCommand($sql)->queryAll();
        return $model;
          
    }

    protected function renderContent()
	{
		$this->render('category',array('data'=>$this->getCategory(),'route'=>$this->route));
	}
    
}