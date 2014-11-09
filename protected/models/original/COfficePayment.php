<?php

/**
 * This is the model class for table "office_payment".
 *
 * The followings are the available columns in table 'office_payment':
 * @property string $id
 * @property string $office_id
 * @property string $payment_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Payment $payment
 * @property Office $office
 */
class COfficePayment extends ActiveRecord {

	public function tableName()	{
		return 'office_payment';
	}

	public function rules()	{
		return array(
			array('office_id, payment_id', 'required'),
			array('office_id, payment_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, office_id, payment_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'payment' => array(self::BELONGS_TO, 'Payment', 'payment_id'),
			'office' => array(self::BELONGS_TO, 'Office', 'office_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'office_id' => 'Office',
			'payment_id' => 'Payment',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('office_id',$this->office_id,true);
		$criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
