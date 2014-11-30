<?php

/**
 * This is the model class for table "office".
 *
 * The followings are the available columns in table 'office':
 * @property string $id
 * @property string $city_id
 * @property string $title
 * @property string $address
 * @property string $phone
 * @property integer $work_day_start
 * @property integer $work_day_end
 * @property string $work_time_start
 * @property string $work_time_end
 * @property string $lunch
 * @property string $x
 * @property string $y
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Cart[] $carts
 * @property City $city
 * @property OfficeDelivery[] $officeDeliveries
 * @property OfficePayment[] $officePayments
 */
class COffice extends ActiveRecord {

	public function tableName()	{
		return 'office';
	}

	public function rules()	{
		return array(
			array('city_id, title, address, phone, work_day_start, work_day_end, work_time_start, work_time_end, x, y', 'required'),
			array('work_day_start, work_day_end', 'numerical', 'integerOnly'=>true),
			array('city_id', 'length', 'max'=>10),
			array('title, phone', 'length', 'max'=>64),
			array('address', 'length', 'max'=>128),
			array('x, y', 'length', 'max'=>9),
			array('status', 'length', 'max'=>7),
			array('lunch, changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city_id, title, address, phone, work_day_start, work_day_end, work_time_start, work_time_end, lunch, x, y, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'carts' => array(self::HAS_MANY, 'Cart', 'office_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'officeDeliveries' => array(self::HAS_MANY, 'OfficeDelivery', 'office_id'),
			'officePayments' => array(self::HAS_MANY, 'OfficePayment', 'office_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'city_id' => 'City',
			'title' => 'Title',
			'address' => 'Address',
			'phone' => 'Phone',
			'work_day_start' => 'Work Day Start',
			'work_day_end' => 'Work Day End',
			'work_time_start' => 'Work Time Start',
			'work_time_end' => 'Work Time End',
			'lunch' => 'Lunch',
			'x' => 'X',
			'y' => 'Y',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('work_day_start',$this->work_day_start);
		$criteria->compare('work_day_end',$this->work_day_end);
		$criteria->compare('work_time_start',$this->work_time_start,true);
		$criteria->compare('work_time_end',$this->work_time_end,true);
		$criteria->compare('lunch',$this->lunch,true);
		$criteria->compare('x',$this->x,true);
		$criteria->compare('y',$this->y,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
