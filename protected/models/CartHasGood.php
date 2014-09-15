<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.08.14
 * Time: 9:33
 * @var Album $album
 */
class CartHasGood extends CCartHasGood {

    protected function instantiate($attributes) {
        /** @var Good $model */
        $good = Good::getFromCache($attributes['good_id']);
        return $good->createCartHasGood();
    }

    protected function _extendedRelations() {
        return array(
            'album' => array(self::BELONGS_TO, 'Album', 'resource_id'),
        );
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