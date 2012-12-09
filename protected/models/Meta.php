<?php

/**
 * This is the model class for table "{{meta}}".
 *
 * The followings are the available columns in table '{{meta}}':
 * @property string $id
 * @property string $object_id
 * @property string $type
 * @property string $meta_key
 * @property string $meta_value
 */
class Meta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Meta the static model class
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
		return '{{meta}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('object_id, meta_key, meta_value', 'required'),
			array('object_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>64),
			array('meta_key', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, object_id, type, meta_key, meta_value', 'safe', 'on'=>'search'),
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
			'object_id' => 'Object',
			'type' => 'Type',
			'meta_key' => 'Meta Key',
			'meta_value' => 'Meta Value',
		);
	}
    
    /**
     * @param type $object_id
     * @param type $type
     * @param type $meta_key
     * @param type $meta_value
     * @return boolean
     */
    public static function addMeta($object_id,$type,$meta_key,$meta_value=array())
    {
        if (isset($meta_value)){
            $values = json_encode($meta_value);
            $meta = new Meta;
            $meta->object_id=$object_id;
            $meta->type=$type;
            $meta->meta_key=$meta_key;
            $meta->meta_value=$values;
           
            if($meta->save()){
                return true;
            }
        } 
        
    }
    
    /**
     * @param type $object_id
     * @param type $type
     * @param type $meta_key
     * @return array meta_value
     */
    public static function getMeta($object_id,$type,$meta_key)
    {
        $meta = new Meta;
        $data = $meta->find(array(
			'condition'=>'type=:type and object_id=:id and meta_key=:meta_key ',
			'params'=>array(':type'=>$type,':id'=>$object_id,':meta_key'=>$meta_key))
        );
        return json_decode($data->attributes['meta_value']);
    }

}