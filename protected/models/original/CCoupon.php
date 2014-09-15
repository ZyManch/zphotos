<?php

/**
 * This is the model class for table "coupon".
 *
 * The followings are the available columns in table 'coupon':
 * @property string $id
 * @property string $hash
 * @property string $cart_id
 * @property string $expired
 * @property string $status
 * @property string $Active
 *
 * The followings are the available model relations:
 * @property Album $cart
 */
class CCoupon extends ActiveRecord {

	public function tableName()	{
		return 'coupon';
	}

	public function rules()	{
		return array(
			array('hash, Active', 'required'),
			array('hash', 'length', 'max'=>64),
			array('cart_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('expired', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hash, cart_id, expired, status, Active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cart' => array(self::BELONGS_TO, 'Album', 'cart_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'hash' => 'Hash',
			'cart_id' => 'Cart',
			'expired' => 'Expired',
			'status' => 'Status',
			'Active' => 'Active',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('cart_id',$this->cart_id,true);
		$criteria->compare('expired',$this->expired,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('Active',$this->Active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
