<?php

/**
 * This is the model class for table "effect".
 *
 * The followings are the available columns in table 'effect':
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $params
 * @property string $group
 * @property string $can_delete
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property ImageEffect[] $imageEffects
 */
class CEffect extends ActiveRecord {

	public function tableName()	{
		return 'effect';
	}

	public function rules()	{
		return array(
			array('name, title, description, group', 'required'),
			array('name', 'length', 'max'=>16),
			array('title', 'length', 'max'=>32),
			array('group', 'length', 'max'=>10),
			array('can_delete', 'length', 'max'=>3),
			array('status', 'length', 'max'=>7),
			array('params, changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, title, description, params, group, can_delete, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'imageEffects' => array(self::HAS_MANY, 'ImageEffect', 'effect_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'title' => 'Title',
			'description' => 'Description',
			'params' => 'Params',
			'group' => 'Group',
			'can_delete' => 'Can Delete',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('can_delete',$this->can_delete,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
