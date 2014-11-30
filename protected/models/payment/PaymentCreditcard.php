<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.11.2014
 * Time: 12:39
 */
class PaymentCreditcard extends PaymentAbstract {

    public function isAlreadyPay(Cart $cart) {
        return $cart->invoice  && $cart->invoice->progress == Invoice::PROGRESS_PAID;
    }

    public function process(Cart $cart) {
        Yii::app()->controller->redirect(array('payment/creditcard'));
    }

}