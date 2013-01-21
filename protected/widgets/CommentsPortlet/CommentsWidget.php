<?php
class CommentsWidget extends CPortlet
{
    public $title='Recent Comments';
	public $limit=10;
    public $route='posts/view';
    
    public function getComments()
    {
        return Comments::model()->with('posts')->findAll(array(
				'condition'=>'t.status='.Comments::STATUS_APPROVED,
				'order'=>'t.created DESC',
				'limit'=>$this->limit,
		));
    }

    protected function renderContent()
	{
		$this->render('comments',array('data'=>$this->getComments(),'route'=>$this->route));
	}
    
}