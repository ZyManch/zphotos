<?php

/**
 * This is the model class for table "good_media".
 *
 * The followings are the available columns in table 'good_media':
 * @property string $id
 * @property string $good_id
 * @property string $title
 * @property string $filename
 * @property string $preview_filename
 * @property integer $width
 * @property integer $height
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Good[] $goods
 * @property Good $good
 */
class CGoodMedia extends ActiveRecord {

	public function tableName()	{
		return 'good_media';
	}

	public function rules()	{
		return array(
			array('good_id, filename, width, height', 'required'),
			array('width, height', 'numerical', 'integerOnly'=>true),
			array('good_id', 'length', 'max'=>11),
			array('title, filename, preview_filename', 'length', 'max'=>128),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, good_id, title, filename, preview_filename, width, height, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'goods' => array(self::HAS_MANY, 'Good', 'good_media_id'),
			'good' => array(self::BELONGS_TO, 'Good', 'good_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'good_id' => 'Good',
			'title' => 'Title',
			'filename' => 'Filename',
			'preview_filename' => 'Preview Filename',
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
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('preview_filename',$this->preview_filename,true);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
