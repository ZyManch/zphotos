<?php
class Payment extends CPayment {

    const PAYMENT_TYPE_CASH = 'cash';
    const PAYMENT_TYPE_CREDITCARD = 'creditcard';

    protected function instantiate($attributes) {
        /** @var CGood $model */
        switch ($attributes['payment_type']) {
            case self::PAYMENT_TYPE_CASH:
                $model = new PaymentCash(null);
                break;
            case self::PAYMENT_TYPE_CREDITCARD:
                $model = new PaymentCreditcard(null);
                break;
            default:
                throw new Exception('Wrong type');
        }
        return $model;
    }

}