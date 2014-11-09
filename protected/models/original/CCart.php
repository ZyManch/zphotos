<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property string $progress
 * @property string $payment_id
 * @property string $delivery_id
 * @property string $office_id
 * @property string $address_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Office $office
 * @property Address $address
 * @property User $user
 * @property Payment $payment
 * @property Delivery $delivery
 * @property CartHasGood[] $cartHasGoods
 * @property Invoice[] $invoices
 */
class CCart extends ActiveRecord {

	public function tableName()	{
		return 'cart';
	}

	public function rules()	{
		return array(
			array('user_id, title, payment_id, delivery_id', 'required'),
			array('user_id, payment_id, delivery_id, office_id, address_id', 'length', 'max'=>10),
			array('title', 'length', 'max'=>128),
			array('progress', 'length', 'max'=>9),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, progress, payment_id, delivery_id, office_id, address_id, status, changed', 'safe', 'on'=>'search'),
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
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'payment' => array(self::BELONGS_TO, 'Payment', 'payment_id'),
			'delivery' => array(self::BELONGS_TO, 'Delivery', 'delivery_id'),
			'cartHasGoods' => array(self::HAS_MANY, 'CartHasGood', 'cart_id'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'cart_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'title' => 'Title',
			'progress' => 'Progress',
			'payment_id' => 'Payment',
			'delivery_id' => 'Delivery',
			'office_id' => 'Office',
			'address_id' => 'Address',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('progress',$this->progress,true);
		$criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('delivery_id',$this->delivery_id,true);
		$criteria->compare('office_id',$this->office_id,true);
		$criteria->compare('address_id',$this->address_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
