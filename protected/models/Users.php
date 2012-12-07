<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property string $id
 * @property string $username
 * @property string $nickname
 * @property string $password
 * @property string $avatar
 * @property string $salt
 * @property string $email
 * @property integer $status
 * @property string $role
 * @property string $user_url
 * @property string $other_details
 * @property string $counts
 * @property string $created
 * @property string $updated
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, salt, email, created, updated', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, password, avatar, salt, email, user_url', 'length', 'max'=>128),
			array('nickname', 'length', 'max'=>32),
			array('role', 'length', 'max'=>64),
			array('other_details', 'length', 'max'=>255),
			array('counts', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, nickname, password, avatar, salt, email, status, role, user_url, other_details, counts, created, updated', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'nickname' => 'Nickname',
			'password' => 'Password',
			'avatar' => 'Avatar',
			'salt' => 'Salt',
			'email' => 'Email',
			'status' => 'Status',
			'role' => 'Role',
			'user_url' => 'User Url',
			'other_details' => 'Other Details',
			'counts' => 'Counts',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('user_url',$this->user_url,true);
		$criteria->compare('other_details',$this->other_details,true);
		$criteria->compare('counts',$this->counts,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt()
	{
		return uniqid('',true);
	}
}