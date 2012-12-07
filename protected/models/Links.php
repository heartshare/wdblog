<?php

/**
 * This is the model class for table "{{links}}".
 *
 * The followings are the available columns in table '{{links}}':
 * @property string $id
 * @property string $link_url
 * @property string $link_name
 * @property string $link_image
 * @property string $link_target
 * @property string $link_description
 * @property integer $link_status
 * @property string $link_owner
 * @property string $link_rating
 * @property string $link_rel
 * @property string $link_notes
 * @property string $link_rss
 * @property string $created
 * @property string $updated
 */
class Links extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Links the static model class
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
		return '{{links}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link_url, link_name, link_target', 'required'),
			array('link_status', 'numerical', 'integerOnly'=>true),
			array('link_url, link_name, link_image, link_description, link_rel, link_rss', 'length', 'max'=>255),
			array('link_target', 'length', 'max'=>32),
			array('link_owner', 'length', 'max'=>20),
			array('link_rating', 'length', 'max'=>11),
			array('link_notes, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, link_url, link_name, link_image, link_target, link_description, link_status, link_owner, link_rating, link_rel, link_notes, link_rss, created, updated', 'safe', 'on'=>'search'),
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
			'link_url' => 'Link Url',
			'link_name' => 'Link Name',
			'link_image' => 'Link Image',
			'link_target' => 'Link Target',
			'link_description' => 'Link Description',
			'link_status' => 'Link Status',
			'link_owner' => 'Link Owner',
			'link_rating' => 'Link Rating',
			'link_rel' => 'Link Rel',
			'link_notes' => 'Link Notes',
			'link_rss' => 'Link Rss',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('link_url',$this->link_url,true);
		$criteria->compare('link_name',$this->link_name,true);
		$criteria->compare('link_image',$this->link_image,true);
		$criteria->compare('link_target',$this->link_target,true);
		$criteria->compare('link_description',$this->link_description,true);
		$criteria->compare('link_status',$this->link_status);
		$criteria->compare('link_owner',$this->link_owner,true);
		$criteria->compare('link_rating',$this->link_rating,true);
		$criteria->compare('link_rel',$this->link_rel,true);
		$criteria->compare('link_notes',$this->link_notes,true);
		$criteria->compare('link_rss',$this->link_rss,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}