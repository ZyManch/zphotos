<?php

/**
 * This is the model class for table "cart_has_good".
 *
 * The followings are the available columns in table 'cart_has_good':
 * @property string $id
 * @property string $cart_id
 * @property string $good_id
 * @property string $resource_id
 * @property string $count
 * @property string $total_price
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Cart $cart
 * @property Good $good
 * @property CartHasGoodCount[] $cartHasGoodCounts
 */
class CCartHasGood extends ActiveRecord {

	public function tableName()	{
		return 'cart_has_good';
	}

	public function rules()	{
		return array(
			array('cart_id, good_id, count, total_price', 'required'),
			array('cart_id, good_id, resource_id, count', 'length', 'max'=>10),
			array('total_price', 'length', 'max'=>6),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cart_id, good_id, resource_id, count, total_price, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cart' => array(self::BELONGS_TO, 'Cart', 'cart_id'),
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
			'cartHasGoodCounts' => array(self::HAS_MANY, 'CartHasGoodCount', 'cart_has_good_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'cart_id' => 'Cart',
			'good_id' => 'Good',
			'resource_id' => 'Resource',
			'count' => 'Count',
			'total_price' => 'Total Price',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('cart_id',$this->cart_id,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('resource_id',$this->resource_id,true);
		$criteria->compare('count',$this->count,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
