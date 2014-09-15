<?php

/**
 * This is the model class for table "font".
 *
 * The followings are the available columns in table 'font':
 * @property string $id
 * @property string $title
 * @property string $filename
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property CutawayTemplateText[] $cutawayTemplateTexts
 * @property CutawayText[] $cutawayTexts
 */
class CFont extends ActiveRecord {

	public function tableName()	{
		return 'font';
	}

	public function rules()	{
		return array(
			array('title, filename', 'required'),
			array('title, filename', 'length', 'max'=>64),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, filename, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cutawayTemplateTexts' => array(self::HAS_MANY, 'CutawayTemplateText', 'font_id'),
			'cutawayTexts' => array(self::HAS_MANY, 'CutawayText', 'font_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'filename' => 'Filename',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
