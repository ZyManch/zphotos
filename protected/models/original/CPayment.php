<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $payment_type
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Cart[] $carts
 * @property OfficePayment[] $officePayments
 */
class CPayment extends ActiveRecord {

	public function tableName()	{
		return 'payment';
	}

	public function rules()	{
		return array(
			array('title, description, payment_type', 'required'),
			array('title', 'length', 'max'=>128),
			array('payment_type', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, payment_type, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'carts' => array(self::HAS_MANY, 'Cart', 'payment_id'),
			'officePayments' => array(self::HAS_MANY, 'OfficePayment', 'payment_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'payment_type' => 'Payment Type',
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
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
