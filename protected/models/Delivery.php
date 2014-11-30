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

    /**
     * @param $cityId
     * @return Office[]
     */
    public function getOffices($cityId) {
        $result = array();
        foreach ($this->officeDeliveries as $officeDelivery) {
            if ($officeDelivery->office->city_id == $cityId) {
                $result[$officeDelivery->office_id] = $officeDelivery->office;
            }
        }
        return $result;
    }

    public function getOptions() {
        return array_filter(explode(',',$this->options));
    }

    public function isNeedAddress() {
        return in_array('need_address',$this->getOptions());
    }

    public function isNeedOffice() {
        return in_array('need_office',$this->getOptions());
    }
}