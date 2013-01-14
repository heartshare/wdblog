<?php
class Tags extends CPortlet
{
    public $title='Tags Portlet';
	public $limit=10;
    
    public function getTags()
	{
		return Terms::findTagWeights();
	}

	protected function renderContent()
	{
		$this->render('tags',array('tags'=>$this->getTags()));
	}
    
}