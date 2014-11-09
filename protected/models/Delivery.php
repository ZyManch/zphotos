<?php

/**
 * Class Delivery
 * @method static model:Delivery
 */
class Delivery extends CDelivery {

    public function getByCity($cityId) {
        $criteria = new CDbCriteria();
        $criteria->with = array(
            'officeDeliveries.office'
        );
        $criteria->compare('office.city_id',$cityId);
        return self::model()->findAll($criteria);
    }
}