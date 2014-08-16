<?php

/**
 * This is the model class for table "coupon".
 *
 * The followings are the available columns in table 'coupon':
 * @property string $id
 * @property string $hash
 * @property string $album_id
 * @property string $expired
 * @property string $status
 * @property string $Active
 *
 * The followings are the available model relations:
 * @property Album $album
 */
class CCoupon extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'coupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hash, Active', 'required'),
			array('hash', 'length', 'max'=>64),
			array('album_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			array('expired', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hash, album_id, expired, status, Active', 'safe', 'on'=>'search'),
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
			'album' => array(self::BELONGS_TO, 'Album', 'album_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hash' => 'Hash',
			'album_id' => 'Album',
			'expired' => 'Expired',
			'status' => 'Status',
			'Active' => 'Active',
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
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('album_id',$this->album_id,true);
		$criteria->compare('expired',$this->expired,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('Active',$this->Active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
