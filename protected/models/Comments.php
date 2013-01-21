<?php

/**
 * This is the model class for table "{{comments}}".
 *
 * The followings are the available columns in table '{{comments}}':
 * @property string $id
 * @property string $parent_id
 * @property string $post_id
 * @property string $user_id
 * @property integer $status
 * @property string $type
 * @property string $author
 * @property string $author_email
 * @property string $author_url
 * @property string $author_ip
 * @property string $content
 * @property string $other_details
 * @property string $created
 * @property string $updated
 */
class Comments extends CActiveRecord
{
    const STATUS_PENDING=1;
	const STATUS_APPROVED=2;

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comments the static model class
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
		return '{{comments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, post_id, status, author, author_email, author_ip, content, other_details, created, updated', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('parent_id, post_id, user_id', 'length', 'max'=>20),
			array('type, author', 'length', 'max'=>64),
			array('author_email, author_url', 'length', 'max'=>255),
			array('author_ip', 'length', 'max'=>86),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, post_id, user_id, status, type, author, author_email, author_url, author_ip, content, other_details, created, updated', 'safe', 'on'=>'search'),
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
            'posts' => array(self::BELONGS_TO, 'Posts', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'post_id' => 'Post',
			'user_id' => 'User',
			'status' => 'Status',
			'type' => 'Type',
			'author' => 'Author',
			'author_email' => 'Author Email',
			'author_url' => 'Author Url',
			'author_ip' => 'Author Ip',
			'content' => 'Content',
			'other_details' => 'Other Details',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

    /**
	 * @param Post the post that this comment belongs to. If null, the method
	 * will query for the post.
	 * @return string the permalink URL for this comment
	 */
	public function getUrl($post=null)
	{
		if($post===null)
			$post=$this->posts;
		return $post->url.'#c'.$this->id;
	}

    /**
	 * @return string the hyperlink display for the current comment's author
	 */
	public function getAuthorLink()
	{
		if(!empty($this->author_url))
			return CHtml::link(CHtml::encode($this->author),$this->author_url,array('target'=>'_blank'));
		else
			return CHtml::encode($this->author);
	}

	/**
	 * @return integer the number of comments that are pending approval
	 */
	public function getPendingCommentCount()
	{
		return $this->count('status='.self::STATUS_PENDING);
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
				$this->created=date('Y-m-d H:i:s');
				$this->author_ip = Yii::app()->request->userHostAddress;  
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
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('author_email',$this->author_email,true);
		$criteria->compare('author_url',$this->author_url,true);
		$criteria->compare('author_ip',$this->author_ip,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('other_details',$this->other_details,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}