<?php

/**
 * This is the model class for table "good".
 *
 * The followings are the available columns in table 'good':
 * @property string $id
 * @property string $title
 * @property string $type
 * @property string $source_id
 * @property string $description
 * @property string $good_media_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Album[] $albums
 * @property CartHasGood[] $cartHasGoods
 * @property CategoryHasGood[] $categoryHasGoods
 * @property Cutaway[] $cutaways
 * @property GoodMedia $goodMedia
 * @property GoodCount[] $goodCounts
 * @property GoodMedia[] $goodMedias
 * @property GoodPrice[] $goodPrices
 */
class CGood extends ActiveRecord {

	public function tableName()	{
		return 'good';
	}

	public function rules()	{
		return array(
			array('title, description', 'required'),
			array('title', 'length', 'max'=>256),
			array('type, status', 'length', 'max'=>7),
			array('source_id, good_media_id', 'length', 'max'=>10),
			array('changed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, type, source_id, description, good_media_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'albums' => array(self::HAS_MANY, 'Album', 'good_id'),
			'cartHasGoods' => array(self::HAS_MANY, 'CartHasGood', 'good_id'),
			'categoryHasGoods' => array(self::HAS_MANY, 'CategoryHasGood', 'good_id'),
			'cutaways' => array(self::HAS_MANY, 'Cutaway', 'good_id'),
			'goodMedia' => array(self::BELONGS_TO, 'GoodMedia', 'good_media_id'),
			'goodCounts' => array(self::HAS_MANY, 'GoodCount', 'good_id'),
			'goodMedias' => array(self::HAS_MANY, 'GoodMedia', 'good_id'),
			'goodPrices' => array(self::HAS_MANY, 'GoodPrice', 'good_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'type' => 'Type',
			'source_id' => 'Source',
			'description' => 'Description',
			'good_media_id' => 'Good Media',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('source_id',$this->source_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('good_media_id',$this->good_media_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
