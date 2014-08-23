<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.08.14
 * Time: 9:33
 */
class CartHasGoodPrint extends CartHasGood {

    public function getTitle() {
        return parent::getTitle().' ('.$this->album->name.' '.$this->album->imageCount.'шт)';
    }

    public function updateTotalPrice() {
        $this->total_price = $this->good->getTotalPriceForCount($this->count * $this->album->imageCount);
    }

}