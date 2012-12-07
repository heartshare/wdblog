<?php
  // @version $Id: MonthlyArchives.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

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
