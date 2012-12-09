<?php

/**
 * MetaForm class.
 * MetaForm is the data structure for keeping
 * Meta form data. 
 */
class MetaForm extends CFormModel
{
	public $object_id;
	public $type;
	public $meta_key;
	public $meta_value;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('object_id, meta_key, meta_value', 'required'),
			array('object_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>64),
			array('meta_key', 'length', 'max'=>255),
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
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Keywords',
		);
	}
}