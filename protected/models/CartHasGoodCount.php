<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 16.08.14
 * Time: 14:08
 */
class CartHasGoodCount extends CCartHasGoodCount {

    protected $_oldCount = 0;

    protected function afterFind() {
        $this->_oldCount = $this->count;
        return parent::afterFind();
    }

    public function save($runValidation=true,$attributes=null) {
        if($runValidation && !$this->validate($attributes)) {
            return false;
        }
        if ($this->cartHasGood->cart->progress == Cart::FILLING) {
            $goodCount = $this->goodCount;
            if (!is_null($goodCount->count_total)) {
                $goodCount->count_locked+=$this->count - $this->_oldCount;
                $goodCount->count_available-=$this->count - $this->_oldCount;
                $goodCount->save(false);
            }
        } else {
            throw new Exception('Error add "cart good count" from already purchased cart');
        }
        return parent::save();
    }

    public function delete() {
        if ($this->cartHasGood->cart->progress == Cart::FILLING) {
            $goodCount = $this->goodCount;
            if (!is_null($goodCount->count_total)) {
                $goodCount->count_available+=$this->count;
                $goodCount->count_locked-=$this->count;
                $goodCount->save(false);
            }
        } else {
            throw new Exception('Error delete "cart good count" from already purchased cart');
        }
        return parent::delete();
    }
}