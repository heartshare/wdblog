<?php
Yii::import('zii.widgets.CPortlet');
class MonthlyArchives extends CPortlet
{
  public $title='Archives';
  public $year = '年';
  public $month = '月';

  public function findAllPostDate()
  {
    return Post::model()->findArchives();
  }

  protected function renderContent()
  {
    $this->render('monthlyArchives');
  }

}
