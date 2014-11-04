<?php

/**
 * This is the model class for table "image".
 *
 * The followings are the available columns in table 'image':
 * @property string $id
 * @property string $album_id
 * @property string $name
 * @property string $filename
 * @property string $orientation
 * @property integer $width
 * @property integer $height
 * @property string $progress
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Album $album
 * @property ImageEffect[] $imageEffects
 */
class CImage extends ActiveRecord {

	public function tableName()	{
		return 'image';
	}

	public function rules()	{
		return array(
			array('album_id, name, filename, width, height', 'required'),
			array('width, height', 'numerical', 'integerOnly'=>true),
			array('album_id, orientation', 'length', 'max'=>10),
			array('name', 'length', 'max'=>64),
			array('filename', 'length', 'max'=>128),
			array('progress', 'length', 'max'=>9),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, album_id, name, filename, orientation, width, height, progress, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'album' => array(self::BELONGS_TO, 'Album', 'album_id'),
			'imageEffects' => array(self::HAS_MANY, 'ImageEffect', 'image_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'album_id' => 'Album',
			'name' => 'Name',
			'filename' => 'Filename',
			'orientation' => 'Orientation',
			'width' => 'Width',
			'height' => 'Height',
			'progress' => 'Progress',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('album_id',$this->album_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('orientation',$this->orientation,true);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('progress',$this->progress,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
