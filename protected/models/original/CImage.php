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
 * @property integer $margin_left
 * @property integer $margin_right
 * @property integer $margin_top
 * @property integer $margin_bottom
 * @property string $progress
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Album $album
 */
class CImage extends ActiveRecord {

	public function tableName()	{
		return 'image';
	}

	public function rules()	{
		return array(
			array('album_id, name, filename, width, height, margin_left, margin_right, margin_top, margin_bottom', 'required'),
			array('width, height, margin_left, margin_right, margin_top, margin_bottom', 'numerical', 'integerOnly'=>true),
			array('album_id, orientation', 'length', 'max'=>10),
			array('name', 'length', 'max'=>64),
			array('filename', 'length', 'max'=>128),
			array('progress', 'length', 'max'=>9),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, album_id, name, filename, orientation, width, height, margin_left, margin_right, margin_top, margin_bottom, progress, status, changed', 'safe', 'on'=>'search'),
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
			'margin_left' => 'Margin Left',
			'margin_right' => 'Margin Right',
			'margin_top' => 'Margin Top',
			'margin_bottom' => 'Margin Bottom',
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
		$criteria->compare('margin_left',$this->margin_left);
		$criteria->compare('margin_right',$this->margin_right);
		$criteria->compare('margin_top',$this->margin_top);
		$criteria->compare('margin_bottom',$this->margin_bottom);
		$criteria->compare('progress',$this->progress,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
