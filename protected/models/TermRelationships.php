<?php

/**
 * This is the model class for table "{{term_relationships}}".
 *
 * The followings are the available columns in table '{{term_relationships}}':
 * @property string $object_id
 * @property string $term_id
 * @property string $term_order
 */
class TermRelationships extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TermRelationships the static model class
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
		return '{{term_relationships}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('object_id, term_id', 'required'),
			array('object_id, term_id', 'length', 'max'=>20),
			array('term_order', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('object_id, term_id, term_order', 'safe', 'on'=>'search'),
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
			'object_id' => 'Object',
			'term_id' => Yii::t('frontend', 'Categories'),
			'term_order' => 'Term Order',
		);
	}

    
    public static function addTerm($object_id,$term_id)
    {
        $model = new TermRelationships;
        $model->object_id = $object_id;
        $model->term_id = $term_id;
        if($model->save()){
            return true;
        }
    }
    
    public static function getTerms($object_id,$type=null)
    {
        if(isset($type)){
            $where = "  and t.taxonomy ='$type'"; 
        }else{
            $where = "";
        }
        $sql="SELECT t.taxonomy ,t.name,l.object_id,l.term_order,l.term_id as term_id FROM {{term_relationships}} as l left join {{terms}} as t on l.term_id = t.id where l.object_id=$object_id $where ";
        $model=Yii::app()->db->createCommand($sql)->queryAll();
        return $model;
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

		$criteria->compare('object_id',$this->object_id,true);
		$criteria->compare('term_id',$this->term_id,true);
		$criteria->compare('term_order',$this->term_order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}