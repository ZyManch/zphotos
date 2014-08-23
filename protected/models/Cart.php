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

    public function getProgressText() {
        if ($this->status == 'Deleted') {
            return 'Удален';
        }
        switch ($this->progress) {
            case self::FILLING:
                return 'Ожидание оплаты';
            case self::PURCHASED:
                return 'Оплачено';
            case self::PRINTING:
                return 'Распечатка';
            case self::PRINTED:
                return 'Распечатано';
            case self::POSTAGE:
                return 'Доставка';
            case self::FINISHED:
                return 'Завершено';
        }
    }

    public function getProgressPercent() {
        switch ($this->progress) {
            case self::FILLING:
                return 0;
            case self::PURCHASED:
                return 20;
            case self::PRINTING:
                return 40;
            case self::PRINTED:
                return 60;
            case self::POSTAGE:
                return 80;
            case self::FINISHED:
                return 100;
        }
    }

    public function hasGood(Good $good, $resourceId = null) {
        foreach ($this->cartGoods as $cartHasGood) {
            if ($cartHasGood->good_id == $good->id && $cartHasGood->resource_id == $resourceId) {
                return true;
            }
        }
        return false;
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

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->cartGoods as $cartGood) {
            $total+=$cartGood->total_price;
        }
        return $total;
    }

    public function addGood(GoodModel $good, $count = 1, $resourceId = null) {
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
            $cartHasGood = $good->createCartHasGood('insert');
            $cartHasGood->attributes = $attributes;
            $cartHasGood->count = $count;
        }
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

    public function removeGood(Good $good, $remove = 1, $resourceId = null) {
        if ($this->progress != self::FILLING) {
            throw new Exception('Вы не можете удаляить товар из корзины после того как корзина уже закрыта');
        }

        $attributes = array(
            'cart_id' => $this->id,
            'good_id' => $good->id,
            'resource_id' => $resourceId
        );
        /** @var CartHasGood $cartHasGood */
        $cartHasGood = CartHasGood::model()->findByAttributes($attributes);
        if (!$cartHasGood) {
            throw new Exception('Не найдено из какого склада товар был забронирован');
        }
        $cartHasGood->count-=$remove;
        if ($cartHasGood->count < 0) {
            throw new Exception('Нельзя убрать товара больше чем есть в корзине');
        }
        if (!$cartHasGood->save()) {
            throw new Exception('Ошибка сохранения cartHasGood:'.$cartHasGood->getErrorsAsText());
        }

        $needCount = $remove;
        foreach ($cartHasGood->cartHasGoodCounts as $cartHasGoodCount) {
            if ($cartHasGoodCount) {
                if ($cartHasGoodCount->count > $needCount) {
                    $cartHasGoodCount->count-=$needCount;
                    if (!$cartHasGoodCount->save()) {
                        throw new Exception($cartHasGoodCount->getErrorsAsText());
                    }
                    $needCount = 0;
                    break;
                } else if ($cartHasGoodCount->count == $needCount) {
                    if (!$cartHasGoodCount->delete()) {
                        throw new Exception($cartHasGoodCount->getErrorsAsText());
                    }
                    $needCount = 0;
                    break;
                } else {
                    $needCount-=$cartHasGoodCount->count;
                    if (!$cartHasGoodCount->delete()) {
                        throw new Exception($cartHasGoodCount->getErrorsAsText());
                    }
                }
            }
        }
        if ($needCount) {
            throw new Exception('Ошибка удаления товара');
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
        if (!$link->save()) {
            throw new Exception($link->getErrorsAsText());
        }
    }

    public function getCartHasGoodSearch() {
        $search = new CartHasGood('search');
        $search->cart_id = $this->id;
        return $search;
    }
}