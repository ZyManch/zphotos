<?php

/**
 * This is the model class for table "cutaway".
 *
 * The followings are the available columns in table 'cutaway':
 * @property string $id
 * @property string $good_id
 * @property string $cutaway_template_id
 * @property string $user_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property CutawayTemplate $cutawayTemplate
 * @property User $user
 * @property Good $good
 * @property CutawayText[] $cutawayTexts
 */
class CCutaway extends ActiveRecord {

	public function tableName()	{
		return 'cutaway';
	}

	public function rules()	{
		return array(
			array('good_id, cutaway_template_id, user_id', 'required'),
			array('good_id, cutaway_template_id', 'length', 'max'=>10),
			array('user_id', 'length', 'max'=>11),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, good_id, cutaway_template_id, user_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cutawayTemplate' => array(self::BELONGS_TO, 'CutawayTemplate', 'cutaway_template_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
			'cutawayTexts' => array(self::HAS_MANY, 'CutawayText', 'cutaway_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'good_id' => 'Good',
			'cutaway_template_id' => 'Cutaway Template',
			'user_id' => 'User',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('cutaway_template_id',$this->cutaway_template_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
