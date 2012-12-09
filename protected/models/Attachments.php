<?php

/**
 * This is the model class for table "{{attachments}}".
 *
 * The followings are the available columns in table '{{attachments}}':
 * @property string $id
 * @property string $user_id
 * @property string $object_id
 * @property string $filename
 * @property string $oldfilename
 * @property string $extension
 * @property string $filesize
 * @property string $filepath
 * @property string $created
 * @property string $updated
 */
class Attachments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attachments the static model class
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
		return '{{attachments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, object_id', 'required'),
			array('user_id, object_id', 'length', 'max'=>20),
			array('filename, oldfilename, filepath', 'length', 'max'=>255),
			array('extension', 'length', 'max'=>32),
			array('filesize', 'length', 'max'=>10),
			array('created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, object_id, filename, oldfilename, extension, filesize, filepath, created, updated', 'safe', 'on'=>'search'),
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
			'user_id' => 'Users',
			'object_id' => 'Object',
			'filename' => 'Filename',
			'oldfilename' => 'Oldfilename',
			'extension' => 'Extension',
			'filesize' => 'Filesize',
			'filepath' => 'Filepath',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('object_id',$this->object_id,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('oldfilename',$this->oldfilename,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('filesize',$this->filesize,true);
		$criteria->compare('filepath',$this->filepath,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}