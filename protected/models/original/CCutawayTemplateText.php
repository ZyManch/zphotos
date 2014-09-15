<?php

/**
 * This is the model class for table "cutaway_template_text".
 *
 * The followings are the available columns in table 'cutaway_template_text':
 * @property string $id
 * @property integer $side
 * @property string $cutaway_template_id
 * @property string $label
 * @property integer $fontsize
 * @property string $color
 * @property string $font_id
 * @property integer $x
 * @property integer $y
 * @property string $orientation
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property CutawayTemplate $cutawayTemplate
 * @property Font $font
 * @property CutawayText[] $cutawayTexts
 */
class CCutawayTemplateText extends ActiveRecord {

	public function tableName()	{
		return 'cutaway_template_text';
	}

	public function rules()	{
		return array(
			array('cutaway_template_id, label, fontsize, color, font_id, x, y', 'required'),
			array('side, fontsize, x, y', 'numerical', 'integerOnly'=>true),
			array('cutaway_template_id, font_id', 'length', 'max'=>10),
			array('color, orientation', 'length', 'max'=>6),
			array('status', 'length', 'max'=>7),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, side, cutaway_template_id, label, fontsize, color, font_id, x, y, orientation, status, changed', 'safe', 'on'=>'search'),
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
			'font' => array(self::BELONGS_TO, 'Font', 'font_id'),
			'cutawayTexts' => array(self::HAS_MANY, 'CutawayText', 'cutaway_template_text_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'side' => 'Side',
			'cutaway_template_id' => 'Cutaway Template',
			'label' => 'Label',
			'fontsize' => 'Fontsize',
			'color' => 'Color',
			'font_id' => 'Font',
			'x' => 'X',
			'y' => 'Y',
			'orientation' => 'Orientation',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('side',$this->side);
		$criteria->compare('cutaway_template_id',$this->cutaway_template_id,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('fontsize',$this->fontsize);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('font_id',$this->font_id,true);
		$criteria->compare('x',$this->x);
		$criteria->compare('y',$this->y);
		$criteria->compare('orientation',$this->orientation,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
