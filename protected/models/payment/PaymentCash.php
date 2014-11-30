<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.11.2014
 * Time: 12:39
 */
class PaymentCash extends PaymentAbstract {

    public function isAlreadyPay(Cart $cart) {
        return $cart->progress == Cart::FINISHED;
    }

    public function process(Cart $cart) {
        $cart->progress = Cart::PRINTING;
        $cart->save(false);
        Yii::app()->user->setFlash(
            'success',
            'Ваш заказ принят.'
        );
    }
}