<?php

/**
 * This is the model class for table "office_delivery".
 *
 * The followings are the available columns in table 'office_delivery':
 * @property string $id
 * @property string $office_id
 * @property string $delivery_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Office $office
 * @property Delivery $delivery
 */
class COfficeDelivery extends ActiveRecord {

	public function tableName()	{
		return 'office_delivery';
	}

	public function rules()	{
		return array(
			array('office_id, delivery_id', 'required'),
			array('office_id, delivery_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, office_id, delivery_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'office' => array(self::BELONGS_TO, 'Office', 'office_id'),
			'delivery' => array(self::BELONGS_TO, 'Delivery', 'delivery_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'office_id' => 'Office',
			'delivery_id' => 'Delivery',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('office_id',$this->office_id,true);
		$criteria->compare('delivery_id',$this->delivery_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
