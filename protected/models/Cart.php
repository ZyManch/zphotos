<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:12
 */
class Cart extends CCart {


    public function getImageProvider() {
        $criteria = new CDbCriteria();
        $criteria->compare('cart_id',$this->id);
        return new CActiveDataProvider('Image',array(
                'criteria'=>$criteria,
        ));
    }

    public function getProgressText() {
        switch ($this->status) {
            case 'Blocked':
                return 'Заблокирован';
            case 'Deleted':
                return 'Удален';
        }
        switch ($this->progress) {
            case 'Filling':
                return 'Ожидание оплаты';
            case 'Purchased':
                return 'Ожидание печати';
            case 'Printing':
                return 'Печать';
            case 'Printed':
                return 'Доставка';
            case 'Finished':
                return 'Завершен';
        }
    }
}