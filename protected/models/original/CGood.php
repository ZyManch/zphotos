<?php

/**
 * This is the model class for table "good".
 *
 * The followings are the available columns in table 'good':
 * @property string $id
 * @property string $title
 * @property string $type
 * @property string $description
 * @property string $good_media_id
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property CategoryHasGood[] $categoryHasGoods
 * @property GoodMedia $goodMedia
 * @property GoodMedia[] $goodMedias
 * @property GoodPrice[] $goodPrices
 * @property PrintFormat $print
 * @property Category[] $categories
 * @property GoodCount[] $goodCounts
 * @property Album $album
 */
class CGood extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'good';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, type', 'required'),
			array('print_format_id,good_media_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>256),
			array('type', 'length', 'max'=>8),
			array('status', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, good_media_id, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'categoryHasGoods' => array(self::HAS_MANY, 'CategoryHasGood', 'good_id'),
			'categories' => array(self::MANY_MANY, 'Category', 'category_has_good(good_id,category_id)'),
			'goodCounts' => array(self::HAS_MANY, 'GoodCount', 'good_id','order' => 'goodCounts.id ASC'),
			'goodMedia' => array(self::BELONGS_TO, 'GoodMedia', 'good_media_id'),
			'goodMedias' => array(self::HAS_MANY, 'GoodMedia', 'good_id'),
			'goodPrices' => array(self::HAS_MANY, 'GoodPrice', 'good_id','order' => 'goodPrices.price DESC'),
			'print' => array(self::BELONGS_TO, 'PrintFormat', 'print_format_id'),
			'album' => array(self::BELONGS_TO, 'Album', 'resource_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'good_media_id' => 'Good Avatar',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('good_media_id',$this->good_media_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
