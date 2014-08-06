<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:12
 */
class Album extends CAlbum {


    public function getImageProvider() {
        $criteria = new CDbCriteria();
        $criteria->compare('album_id',$this->id);
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
        if (!$this->cartHasGood) {
            return 'Заполняется';
        }
        switch ($this->cartHasGood->cart->status) {
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