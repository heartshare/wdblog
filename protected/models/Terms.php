<?php

/**
 * This is the model class for table "{{terms}}".
 *
 * The followings are the available columns in table '{{terms}}':
 * @property string $id
 * @property string $parent_id
 * @property string $taxonomy
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $count
 */
class Terms extends CActiveRecord
{
    private static $_items=array();
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Terms the static model class
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
		return '{{terms}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taxonomy, name', 'required'),
			array('parent_id, count', 'length', 'max'=>20),
			array('taxonomy', 'length', 'max'=>64),
			array('name, slug', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, taxonomy, name, slug, description, count', 'safe', 'on'=>'search'),
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
            'categoryCount'=>array(self::STAT,'TermRelationships','term_id','order'=>'TermRelationships.term_order DESC'),
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
			'taxonomy' => 'Taxonomy',
			'name' => 'Name',
			'slug' => 'Slug',
			'description' => 'Description',
			'count' => 'Count',
		);
	}
    
    /**
     * Returns the items for the specified type.
     * @param string the item type (e.g. 'posts', 'tags').
     * @return type 
     */
    public static function items($type)
    {
        if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return self::$_items[$type];
    }

    /**
     * Returns the item name for the specified type and id.
     * @param string the item type (e.g. 'post', 'tag').
     * @param type $id
     * @return type 
     */
    public static function item($type,$id)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return isset(self::$_items[$type][$id]) ? self::$_items[$type][$id] : false;
	}
    
    /**
     * Loads the Terms items for the specified type from the database.
     * @param string the item type
     */
    public static function loadItems($type)
    {
        self::$_items[$type]=array();
		$models=self::model()->findAll(array(
			'condition'=>'taxonomy=:type',
			'params'=>array(':type'=>$type),
		));
        if($type == 'tags')
        {
            foreach($models as $model)
                self::$_items[$type][]=$model->name;
        }else{
            foreach($models as $model)
                self::$_items[$type][$model->id]=$model->name;
        }
		
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
		$criteria->compare('taxonomy',$this->taxonomy,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('count',$this->count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}