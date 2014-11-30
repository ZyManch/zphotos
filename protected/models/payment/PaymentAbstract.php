<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.11.2014
 * Time: 12:40
 */
abstract class PaymentAbstract extends Payment {


    abstract public function isAlreadyPay(Cart $cart);


    abstract public function process(Cart $cart);
}