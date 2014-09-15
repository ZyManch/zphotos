<?php

/**
 * This is the model class for table "category_has_good".
 *
 * The followings are the available columns in table 'category_has_good':
 * @property string $id
 * @property string $category_id
 * @property string $good_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Good $good
 */
class CCategoryHasGood extends ActiveRecord {

	public function tableName()	{
		return 'category_has_good';
	}

	public function rules()	{
		return array(
			array('category_id, good_id', 'required'),
			array('category_id, good_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, good_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'good_id' => 'Good',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
