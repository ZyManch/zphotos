<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property Album[] $albums
 * @property Cart[] $carts
 * @property Cutaway[] $cutaways
 * @property Invoice[] $invoices
 */
class CUser extends ActiveRecord {

	public function tableName()	{
		return 'user';
	}

	public function rules()	{
		return array(
			array('username', 'length', 'max'=>128),
			array('email', 'length', 'max'=>64),
			array('password', 'length', 'max'=>32),
			array('type', 'length', 'max'=>5),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password, type, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'addresses' => array(self::HAS_MANY, 'Address', 'user_id'),
			'albums' => array(self::HAS_MANY, 'Album', 'user_id'),
			'carts' => array(self::HAS_MANY, 'Cart', 'user_id'),
			'cutaways' => array(self::HAS_MANY, 'Cutaway', 'user_id'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'user_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'type' => 'Type',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
