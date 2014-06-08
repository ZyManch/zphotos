<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:11
 */
class ActiveRecord extends CActiveRecord {


    public function getErrorsAsText() {
        $result = array();
        foreach($this->getErrors() as $key => $errors) {
            $result[] = $key.': '.implode(',',$errors);
        }
        return implode('. ', $result);
    }


    public static function model($className=null) {
        if (is_null($className)) {
            $className = get_called_class();
        }
        return parent::model($className);
    }
}