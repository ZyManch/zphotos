<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 10:59
 */
class GoodPrice extends CGoodPrice {

    public function getHumanPrice() {
        return number_format($this->price,2,',',' ').'р.';
    }
}