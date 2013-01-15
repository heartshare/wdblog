<?php
class MonthlyArchivesWidget extends CPortlet
{
    public $title='Monthly Archives';
	public $year = '年';
    public $month = '月';
    public $route='posts/index';
    
    public function getArchives()
    {
        $sql="SELECT YEAR(created) AS `year`, MONTH(created) AS `month`, count(id) as posts FROM {{posts}} as t  where t.post_status =".Posts::STATUS_PUBLISHED." group by YEAR(FROM_UNIXTIME(created)), MONTH(FROM_UNIXTIME(created)) order by t.created DESC";
        $model=Yii::app()->db->createCommand($sql)->queryAll();
        return $model;
    }

    protected function renderContent()
	{
		$this->render('monthlyArchives',array('data'=>$this->getArchives(),'route'=>$this->route));
	}
    
}