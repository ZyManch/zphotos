<?php

/**
 * This is the model class for table "delivery".
 *
 * The followings are the available columns in table 'delivery':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property OfficeDelivery[] $officeDeliveries
 */
class CDelivery extends ActiveRecord {

	public function tableName()	{
		return 'delivery';
	}

	public function rules()	{
		return array(
			array('title, description', 'required'),
			array('title', 'length', 'max'=>128),
			array('price', 'length', 'max'=>6),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, price, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'officeDeliveries' => array(self::HAS_MANY, 'OfficeDelivery', 'delivery_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'price' => 'Price',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
