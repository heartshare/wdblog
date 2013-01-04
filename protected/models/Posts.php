<?php

/**
 * This is the model class for table "{{posts}}".
 *
 * The followings are the available columns in table '{{posts}}':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property string $excerpt
 * @property string $content
 * @property string $content_filtered
 * @property integer $post_status
 * @property integer $comment_status
 * @property integer $ping_status
 * @property string $password
 * @property string $read_count
 * @property string $post_type
 * @property string $to_ping
 * @property string $pinged
 * @property string $parent_id
 * @property string $menu_order
 * @property string $slug
 * @property string $created
 * @property string $updated
 */
class Posts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{posts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, post_status, comment_status, ping_status', 'required'),
			array('post_status, comment_status, ping_status', 'numerical', 'integerOnly'=>true),
			array('user_id, read_count, parent_id', 'length', 'max'=>20),
			array('title, slug', 'length', 'max'=>255),
			array('password, post_type', 'length', 'max'=>32),
			array('to_ping, pinged, menu_order', 'length', 'max'=>11),
			array('excerpt, content_filtered', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, title, excerpt, content, content_filtered, post_status, comment_status, ping_status, password, read_count, post_type, to_ping, pinged, parent_id, menu_order, slug, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'author' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'title' => Yii::t('frontend', 'Title'),
			'excerpt' => Yii::t('frontend', 'Excerpt'),
			'content' => Yii::t('frontend', 'Content'),
			'content_filtered' => 'Content Filtered',
			'post_status' => Yii::t('frontend','Status'),
			'comment_status' => Yii::t('frontend','Comments').Yii::t('frontend','Status'),
			'ping_status' => Yii::t('frontend','Ping').Yii::t('frontend','Status'),
			'password' => Yii::t('frontend','Password'),
			'read_count' => Yii::t('frontend','Read Count'),
			'post_type' => 'Post Type',
			'to_ping' => 'To Ping',
			'pinged' => 'Pinged',
			'parent_id' => 'Parent',
			'menu_order' => 'Menu Order',
			'slug' => Yii::t('frontend','Slug'),
			'created' => Yii::t('frontend','Created'),
			'updated' => Yii::t('frontend','Updated'),
		);
	}
    
    /**
     * @return array  MonthlyArchives
     */
    public function findArchives()
	{
		return $this->findAll(array(
                'select'=>'YEAR(FROM_UNIXTIME(created)) AS `year`, MONTH(FROM_UNIXTIME(created)) AS `month`, count(id) as posts',
                'condition'=>'t.status='.self::STATUS_PUBLISHED,
                'group'=>'YEAR(FROM_UNIXTIME(created)), MONTH(FROM_UNIXTIME(created))',
				'order'=>'t.created DESC',
		));
	}
	
	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('posts/view', array(
				'id'=>$this->id,
				'title'=>str_replace(' ','-',  trim($this->title)),
		));
	}

   
    /**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->created=date('Y-m-d H:i:s');
                $this->updated=date('Y-m-d H:i:s');
				$this->user_id=Yii::app()->user->id;
			}
			else
				$this->updated=date('Y-m-d H:i:s');
			return true;
		}
		else
			return false;
	}
    
    
    /**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('post_status',$this->post_status);
		$criteria->compare('comment_status',$this->comment_status);
		$criteria->compare('ping_status',$this->ping_status);
		$criteria->compare('read_count',$this->read_count,true);
		$criteria->compare('post_type',$this->post_type,true);
		$criteria->compare('to_ping',$this->to_ping,true);
		$criteria->compare('pinged',$this->pinged,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('menu_order',$this->menu_order,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
            'sort'=>array(
	            'defaultOrder'=>'created DESC', //设置默认排序是created倒序
	        ),
			'criteria'=>$criteria,
		));
	}
}