<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.08.14
 * Time: 9:33
 */
class CartHasGoodCutaway extends CartHasGood {

    public function getTitle() {
        return parent::getTitle();
    }

    public function updateTotalPrice() {
        $this->updateTotalPrice();
    }

}