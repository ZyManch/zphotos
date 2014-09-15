<?php

/**
 * This is the model class for table "good_count".
 *
 * The followings are the available columns in table 'good_count':
 * @property string $id
 * @property string $good_id
 * @property integer $count_total
 * @property integer $count_available
 * @property integer $count_locked
 * @property string $cost
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property CartHasGoodCount[] $cartHasGoodCounts
 * @property Good $good
 */
class CGoodCount extends ActiveRecord {

	public function tableName()	{
		return 'good_count';
	}

	public function rules()	{
		return array(
			array('good_id', 'required'),
			array('count_total, count_available, count_locked', 'numerical', 'integerOnly'=>true),
			array('good_id', 'length', 'max'=>10),
			array('cost', 'length', 'max'=>8),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, good_id, count_total, count_available, count_locked, cost, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cartHasGoodCounts' => array(self::HAS_MANY, 'CartHasGoodCount', 'good_count_id'),
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'good_id' => 'Good',
			'count_total' => 'Count Total',
			'count_available' => 'Count Available',
			'count_locked' => 'Count Locked',
			'cost' => 'Cost',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('count_total',$this->count_total);
		$criteria->compare('count_available',$this->count_available);
		$criteria->compare('count_locked',$this->count_locked);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
