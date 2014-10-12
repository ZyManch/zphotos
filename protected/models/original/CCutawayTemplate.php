<?php

/**
 * This is the model class for table "cutaway_template".
 *
 * The followings are the available columns in table 'cutaway_template':
 * @property string $id
 * @property string $filename
 * @property string $second_filename
 * @property integer $width
 * @property integer $height
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Cutaway[] $cutaways
 * @property CutawayTemplateText[] $cutawayTemplateTexts
 */
class CCutawayTemplate extends ActiveRecord {

	public function tableName()	{
		return 'cutaway_template';
	}

	public function rules()	{
		return array(
			array('filename, width, height', 'required'),
			array('width, height', 'numerical', 'integerOnly'=>true),
			array('filename, second_filename', 'length', 'max'=>128),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, filename, second_filename, width, height, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cutaways' => array(self::HAS_MANY, 'Cutaway', 'cutaway_template_id'),
			'cutawayTemplateTexts' => array(self::HAS_MANY, 'CutawayTemplateText', 'cutaway_template_id','index' => 'id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'filename' => 'Filename',
			'second_filename' => 'Second Filename',
			'width' => 'Width',
			'height' => 'Height',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('second_filename',$this->second_filename,true);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
