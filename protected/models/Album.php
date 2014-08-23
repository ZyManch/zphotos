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

    public function inCurrentCart() {
        $cart = Cart::getCurrent(false);
        if (!$cart) {
            return false;
        }
        return $cart->hasGood($this->good, $this->id);
    }

    public function inAnyCart() {
        return sizeof($this->getCartHasGoods()) > 0;
    }

    /**
     * @return CartHasGood[]
     */
    public function getCartHasGoods() {
        $criteria = new CDbCriteria();
        $criteria->with = array('good');
        $criteria->compare('good.type','print');
        $criteria->compare('t.resource_id',$this->id);
        return CartHasGood::model()->findAll($criteria);
    }

    public function changeGood(GoodPrint $good) {
        $previousFormat = $this->good->print;
        $newFormat = $good->print;
        $this->good_id = $good->id;
        if (!$this->save()) {
            return false;
        }
        if ($newFormat->weight / $newFormat->height != $previousFormat->width / $previousFormat->height) {
            foreach ($this->images as $image) {
                $image->fillAutoMargin();
                if (!$image->save()) {
                    throw new Exception('Ошибка изменения отступов изображения');
                }
            }
        }
        return true;
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
        return $this->cartHasGood->cart->getProgressText();
    }
}