<?php

/**
 * This is the model class for table "cart_has_good_count".
 *
 * The followings are the available columns in table 'cart_has_good_count':
 * @property string $id
 * @property string $cart_has_good_id
 * @property string $good_count_id
 * @property string $count
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property CartHasGood $cartHasGood
 * @property GoodCount $goodCount
 */
class CCartHasGoodCount extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cart_has_good_count';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cart_has_good_id, good_count_id, count', 'required'),
			array('cart_has_good_id, good_count_id, count', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('changed', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cart_has_good_id, good_count_id, count, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cartHasGood' => array(self::BELONGS_TO, 'CartHasGood', 'cart_has_good_id'),
			'goodCount' => array(self::BELONGS_TO, 'GoodCount', 'good_count_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cart_has_good_id' => 'Cart Has Good',
			'good_count_id' => 'Good Count',
			'count' => 'Count',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('cart_has_good_id',$this->cart_has_good_id,true);
		$criteria->compare('good_count_id',$this->good_count_id,true);
		$criteria->compare('count',$this->count,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CCartHasGoodCount the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
