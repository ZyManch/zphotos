<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string $parent_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Category $parent
 * @property Category[] $categories
 * @property CategoryHasGood[] $categoryHasGoods
 */
class CCategory extends ActiveRecord {

	public function tableName()	{
		return 'category';
	}

	public function rules()	{
		return array(
			array('title, description', 'required'),
			array('title, image', 'length', 'max'=>128),
			array('parent_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, image, description, parent_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'Category', 'parent_id'),
			'categories' => array(self::HAS_MANY, 'Category', 'parent_id'),
			'categoryHasGoods' => array(self::HAS_MANY, 'CategoryHasGood', 'category_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'image' => 'Image',
			'description' => 'Description',
			'parent_id' => 'Parent',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
