<?php

/**
 * This is the model class for table "{{user_binding}}".
 *
 * The followings are the available columns in table '{{user_binding}}':
 * @property string $user_id
 * @property string $user_openid
 * @property string $user_bind_type
 * @property string $other_details
 * @property string $created
 * @property string $updated
 */
class UserBinding extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserBinding the static model class
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
		return '{{user_binding}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_openid, user_bind_type, created, updated', 'required'),
			array('user_id', 'length', 'max'=>20),
			array('user_openid', 'length', 'max'=>128),
			array('user_bind_type', 'length', 'max'=>45),
			array('other_details', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_openid, user_bind_type, other_details, created, updated', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'user_openid' => 'User Openid',
			'user_bind_type' => 'User Bind Type',
			'other_details' => 'Other Details',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_openid',$this->user_openid,true);
		$criteria->compare('user_bind_type',$this->user_bind_type,true);
		$criteria->compare('other_details',$this->other_details,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}