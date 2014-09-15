<?php

/**
 * This is the model class for table "print_format".
 *
 * The followings are the available columns in table 'print_format':
 * @property string $id
 * @property string $title
 * @property string $type
 * @property integer $width
 * @property integer $height
 * @property integer $weight
 * @property string $paper_type
 * @property string $color
 * @property string $status
 * @property string $changed
 */
class CPrintFormat extends ActiveRecord {

	public function tableName()	{
		return 'print_format';
	}

	public function rules()	{
		return array(
			array('title, type, width, height, weight, color', 'required'),
			array('width, height, weight', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>128),
			array('type, color', 'length', 'max'=>5),
			array('paper_type', 'length', 'max'=>6),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, type, width, height, weight, paper_type, color, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'type' => 'Type',
			'width' => 'Width',
			'height' => 'Height',
			'weight' => 'Weight',
			'paper_type' => 'Paper Type',
			'color' => 'Color',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('paper_type',$this->paper_type,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
