<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.08.14
 * Time: 9:33
 */
class CartHasGood extends CCartHasGood {

    protected function instantiate($attributes) {
        /** @var Good $model */
        $good = Good::getFromCache($attributes['good_id']);
        return $good->createCartHasGood();
    }

    public function save($runValidation=true,$attributes=null) {
        $this->updateTotalPrice();
        return parent::save($runValidation, $attributes);
    }

    public function updateTotalPrice() {
        $this->total_price = $this->good->getTotalPriceForCount($this->count);
    }

    public function getTitle() {
        return $this->good->title;
    }
}