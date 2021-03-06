<?php

/**
 * This is the model class for table "good_price".
 *
 * The followings are the available columns in table 'good_price':
 * @property string $id
 * @property string $good_id
 * @property integer $count
 * @property string $price
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Good $good
 */
class CGoodPrice extends ActiveRecord {

	public function tableName()	{
		return 'good_price';
	}

	public function rules()	{
		return array(
			array('good_id', 'required'),
			array('count', 'numerical', 'integerOnly'=>true),
			array('good_id', 'length', 'max'=>11),
			array('price', 'length', 'max'=>6),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, good_id, count, price, status, changed', 'safe', 'on'=>'search'),
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
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'good_id' => 'Good',
			'count' => 'Count',
			'price' => 'Price',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('count',$this->count);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
