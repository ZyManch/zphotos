<?php

/**
 * This is the model class for table "image_effect".
 *
 * The followings are the available columns in table 'image_effect':
 * @property string $id
 * @property string $image_id
 * @property string $effect_id
 * @property string $params
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Image $image
 * @property Effect $effect
 */
class CImageEffect extends ActiveRecord {

	public function tableName()	{
		return 'image_effect';
	}

	public function rules()	{
		return array(
			array('image_id, effect_id', 'required'),
			array('image_id, effect_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('params, changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image_id, effect_id, params, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'image' => array(self::BELONGS_TO, 'Image', 'image_id'),
			'effect' => array(self::BELONGS_TO, 'Effect', 'effect_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'image_id' => 'Image',
			'effect_id' => 'Effect',
			'params' => 'Params',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('image_id',$this->image_id,true);
		$criteria->compare('effect_id',$this->effect_id,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
