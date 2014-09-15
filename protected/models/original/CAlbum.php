<?php

/**
 * This is the model class for table "album".
 *
 * The followings are the available columns in table 'album':
 * @property string $id
 * @property string $user_id
 * @property string $good_id
 * @property string $name
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Good $good
 * @property User $user
 * @property Coupon[] $coupons
 * @property Image[] $images
 */
class CAlbum extends ActiveRecord {

	public function tableName()	{
		return 'album';
	}

	public function rules()	{
		return array(
			array('user_id, good_id, name', 'required'),
			array('user_id', 'length', 'max'=>11),
			array('good_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>64),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, good_id, name, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'coupons' => array(self::HAS_MANY, 'Coupon', 'cart_id'),
			'images' => array(self::HAS_MANY, 'Image', 'album_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'good_id' => 'Good',
			'name' => 'Name',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
