<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property string $id
 * @property string $user_id
 * @property string $cart_id
 * @property string $amount
 * @property string $description
 * @property string $paid
 * @property string $progress
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Cart $cart
 */
class CInvoice extends ActiveRecord {

	public function tableName()	{
		return 'invoice';
	}

	public function rules()	{
		return array(
			array('user_id, cart_id, amount', 'required'),
			array('user_id, cart_id', 'length', 'max'=>10),
			array('amount', 'length', 'max'=>8),
			array('description', 'length', 'max'=>200),
			array('progress', 'length', 'max'=>6),
			array('status', 'length', 'max'=>7),
			array('paid, changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, cart_id, amount, description, paid, progress, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'cart' => array(self::BELONGS_TO, 'Cart', 'cart_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'cart_id' => 'Cart',
			'amount' => 'Amount',
			'description' => 'Description',
			'paid' => 'Paid',
			'progress' => 'Progress',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('cart_id',$this->cart_id,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('paid',$this->paid,true);
		$criteria->compare('progress',$this->progress,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
