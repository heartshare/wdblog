<?php

/**
 * This is the model class for table "{{posts}}".
 *
 * The followings are the available columns in table '{{posts}}':
 * @property string $id
 * @property string $users_id
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
 * @property string $update
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
			array('users_id, title, content, post_status, comment_status, ping_status, created, update', 'required'),
			array('post_status, comment_status, ping_status', 'numerical', 'integerOnly'=>true),
			array('users_id, read_count, parent_id', 'length', 'max'=>20),
			array('title, slug', 'length', 'max'=>255),
			array('password, post_type', 'length', 'max'=>32),
			array('to_ping, pinged, menu_order', 'length', 'max'=>11),
			array('excerpt, content_filtered', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, users_id, title, excerpt, content, content_filtered, post_status, comment_status, ping_status, password, read_count, post_type, to_ping, pinged, parent_id, menu_order, slug, created, update', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_id' => 'Users',
			'title' => 'Title',
			'excerpt' => 'Excerpt',
			'content' => 'Content',
			'content_filtered' => 'Content Filtered',
			'post_status' => 'Post Status',
			'comment_status' => 'Comment Status',
			'ping_status' => 'Ping Status',
			'password' => 'Password',
			'read_count' => 'Read Count',
			'post_type' => 'Post Type',
			'to_ping' => 'To Ping',
			'pinged' => 'Pinged',
			'parent_id' => 'Parent',
			'menu_order' => 'Menu Order',
			'slug' => 'Slug',
			'created' => 'Created',
			'update' => 'Update',
		);
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
		$criteria->compare('users_id',$this->users_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('content_filtered',$this->content_filtered,true);
		$criteria->compare('post_status',$this->post_status);
		$criteria->compare('comment_status',$this->comment_status);
		$criteria->compare('ping_status',$this->ping_status);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('read_count',$this->read_count,true);
		$criteria->compare('post_type',$this->post_type,true);
		$criteria->compare('to_ping',$this->to_ping,true);
		$criteria->compare('pinged',$this->pinged,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('menu_order',$this->menu_order,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('update',$this->update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}