<?php
class ArticleWidget extends CPortlet
{
    public $title='Hot Article';
    public $type = 'hot'; //hot and recent
    public $limit=10;
    public $route='posts/view';
    
    public function getArticle()
    {
        if($this->type =='hot')
        {
          $orderby = 'read_count';
        }else{
          $orderby = 'created';
        }
        $sql="SELECT id,title,slug  FROM {{posts}} where  post_status=".Posts::STATUS_PUBLISHED."   ORDER BY $orderby DESC LIMIT $this->limit";
        $model=Yii::app()->db->createCommand($sql)->queryAll();
        return $model;
    }

    protected function renderContent()
	{
		$this->render('article',array('data'=>$this->getArticle(),'route'=>$this->route));
	}
    
}