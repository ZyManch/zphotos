<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.08.14
 * Time: 9:32
 */
class Cart extends CCart {

    const FILLING   = 'Filling';
    const PURCHASED = 'Purchased';
    const PRINTING  = 'Printing';
    const PRINTED   = 'Printed';
    const POSTAGE   = 'Postage';
    const FINISHED  = 'Finished';

    /**
     * @param bool $createNew
     * @return Cart
     */
    public static function getCurrent($createNew = false) {
        if (Yii::app()->user->getIsGuest()) {
            return null;
        }
        $attributes = array(
            'user_id' => Yii::app()->user->id,
            'progress' => self::FILLING
        );
        $cart = Cart::model()->findByAttributes($attributes);
        if(!$cart && $createNew) {
            $cart = new Cart();
            $cart->attributes = $attributes;
            $cart->title = 'Покупка от '.date('Y-m-d');
            if (!$cart->save()) {
                throw new Exception('Ошибка сохранения корзины: '.$cart->getErrorsAsText());
            }
        }
        return $cart;
    }

    public static function getCarts($excludeProgress = array(self::FILLING)) {
        $criteria = new CDbCriteria();
        $criteria->compare('t.user_id', Yii::app()->user->id);
        if ($excludeProgress) {
            $criteria->addNotInCondition('t.progress',$excludeProgress);
        }
        $criteria->order = 't.title ASC';
        return Cart::model()->findAll($criteria);
    }

    public function addGood(Good $good, $count = 1, $resourceId = null) {
        if ($this->progress != self::FILLING) {
            throw new Exception('You cant add to cart after filling is completed');
        }
        if ($count < 1) {
            throw new Exception('Count will be more than 0');
        }
        if ($good->getCount(Good::COUNT_AVAILABLE) < $count) {
            throw new Exception('All items is already purchased');
        }
        $attributes = array(
            'cart_id' => $this->id,
            'good_id' => $good->id,
            'resource_id' => $resourceId
        );
        /** @var CartHasGood $cartHasGood */
        $cartHasGood = CartHasGood::model()->findByAttributes($attributes);
        if ($cartHasGood) {
            $cartHasGood->count+=$count;
        } else {
            $cartHasGood = new CartHasGood();
            $cartHasGood->attributes = $attributes;
            $cartHasGood->count = $count;
        }
        $cartHasGood->total_price = $good->getTotalPriceForCount($cartHasGood->count);
        if (!$cartHasGood->save()) {
            throw new Exception('Ошибка сохранения cartHasGood:'.$cartHasGood->getErrorsAsText());
        }
        $needCount = $count;
        foreach ($good->goodCounts as $goodCount) {
            if (is_null($goodCount->count_total)) {
                $this->_linkGoodCountWithGood($cartHasGood, $goodCount, $needCount);
                $needCount = 0;
                break;
            }
            if ($goodCount->count_available < $needCount) {
                $this->_linkGoodCountWithGood($cartHasGood, $goodCount, $goodCount->count_available);
                $needCount-=$goodCount->count_available;
            } else {
                $this->_linkGoodCountWithGood($cartHasGood, $goodCount, $needCount);
                $needCount = 0;
                break;
            }
        }
        if ($needCount) {
            throw new Exception('Problem with create cart');
        }
        return true;
    }

    protected function _linkGoodCountWithGood(CartHasGood $cartHasGood, GoodCount $goodCount, $count) {
        $link = new CartHasGoodCount();
        $link->attributes = array(
            'cart_has_good_id' => $cartHasGood->id,
            'good_count_id' => $goodCount->id,
            'count' => $count
        );
        return $link->save();
    }

    public function getCartHasGoodSearch() {
        $search = new CartHasGood('search');
        $search->cart_id = $this->id;
        return $search;
    }
}