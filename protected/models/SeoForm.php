<?php

/**
 * MetaForm class.
 * MetaForm is the data structure for keeping
 * Meta form data. 
 */
class SeoForm extends CFormModel
{
	public $keywords;
	public $description;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('description', 'length', 'max'=>255),
            array('keywords', 'length', 'max'=>255),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'keywords' => Yii::t('frontend','Keywords'),
			'description' => Yii::t('frontend','Description'),
		);
	}
}