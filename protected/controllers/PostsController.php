<?php

class PostsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model = TermRelationships::getTerms($id);
        if(isset($model))
        {
            $terms = array();
            foreach ($model as $value) 
            {
                $terms[$value['taxonomy']][] = $value;
            }
        }
        Posts::model()->updateCounters(array('read_count'=>1)); //更新阅读数
        $posts=$this->loadModel($id);
		$comment=$this->newComments($posts);
		$this->render('view',array(
			'model'=>$posts,
            'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Posts;
        $seoModel =new SeoForm;
        $terms = new TermRelationships;
        $tags = '';
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
       
		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
            {
                //添加 keywords and description
                Meta::addMeta($model->id, 'posts', '_seo_post_meta', $_POST['SeoForm']);
                //添加分类
                if(!empty($_POST['TermRelationships']['term_id']))
                {
                    foreach ($_POST['TermRelationships']['term_id'] as $value) 
                    {
                        TermRelationships::addTerm($model->id, $value);
                    }
                }
                $this->redirect(array('view','id'=>$model->id));
            }
				
		}

		$this->render('create',array(
			'model'=>$model,
            'seoForm'=>$seoModel,
            'terms'=>$terms,
            'tags'=>$tags,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $seoModel =new SeoForm;
        $terms = new TermRelationships;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
        
        $tagsList = TermRelationships::getTerms($id, 'tags');
        if(isset($tagsList))
        {
            $tag = array();
            foreach($tagsList as $v)
            {
                $tag[] = $v['name'];
            }
        }
        $tags = implode(',',$tag);
        $meta = Meta::getMeta($id, 'posts', '_seo_post_meta');
        $seoModel->keywords= $meta->keywords;
        $seoModel->description= $meta->description;
        $cagegory = TermRelationships::getTerms($id, 'posts');
        if(isset($cagegory))
        {
            $term_ids = array();
            foreach($cagegory as $v)
            {
                $term_ids[] = $v['term_id'];
            }
        }
        $terms->term_id = $term_ids;
		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
            {
              
              $this->redirect(array('view','id'=>$model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
            'seoForm'=>$seoModel,
            'terms'=>$terms,
            'tags'=>$tags,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria = new CDbCriteria();
		$criteria->compare('post_status', Posts::STATUS_PUBLISHED);
		$criteria->order = 'created DESC';
		
		$dataProvider = new CActiveDataProvider('Posts',array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>Yii::app()->params['pageSize'],
				),
		));
        
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Posts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Posts']))
			$model->attributes=$_GET['Posts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Posts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='posts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    /**
	 * Creates a new Comments.
	 * This method attempts to create a new Comments based on the user input.
	 * If the Comments is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comments the comment instance
	 */
	protected function newComments($post)
	{
		$comment=new Comments;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}
