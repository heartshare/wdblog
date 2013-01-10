<?php
class Terms extends CWidget
{
    public $id='';
    public $type = 'posts';
    public $data = array();

    public function init()
    {
        //当视图中执行$this->beginWidget()时候会执行这个方法
        $this->findAllTerms();
    }

    public function findAllTerms()
    {
            $model = TermRelationships::getTerms($this->id);
            if(isset($model))
            {
                $this->data = array();
                foreach ($model as $value) 
                {
                    $this->data[$value['taxonomy']][] = $value;
                }
            }
            return $this->data;
    }

    public function run()
    {
         
            //注意widget的视图是放在跟widgets同级的views目录下面，例如下面的视图会放置在
            $this->render('terms', array(
                'data'=>$this->data[$this->type],
            ));
        }

}
