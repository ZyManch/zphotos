<?php

/**
 * This is the model class for table "good_count".
 *
 * The followings are the available columns in table 'good_count':
 * @property string $id
 * @property string $good_id
 * @property integer $count_total
 * @property integer $count_locked
 * @property integer $count_available
 * @property string $cost
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Good $good
 */
class CGoodCount extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'good_count';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('good_id, changed', 'required'),
			array('count_total, count_locked, count_available', 'numerical', 'integerOnly'=>true),
			array('good_id', 'length', 'max'=>10),
			array('cost', 'length', 'max'=>8),
			array('status', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, good_id, count_total, count_locked, count_available, cost, status, changed', 'safe', 'on'=>'search'),
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
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'good_id' => 'Good',
			'count_total' => 'Count Total',
			'count_locked' => 'Count Locked',
			'count_available' => 'Count Available',
			'cost' => 'Cost',
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
		$criteria->compare('good_id',$this->good_id,true);
        $criteria->compare('count_total',$this->count_total);
        $criteria->compare('count_locked',$this->count_locked);
		$criteria->compare('count_available',$this->count_available);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
