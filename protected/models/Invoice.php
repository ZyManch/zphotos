<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 11:18
 * @method static Invoice model()
 * @method Invoice findByPk($pk)
 */
class Invoice extends CInvoice {

    const PROGRESS_PAYING = 'paying';
    const PROGRESS_PAID = 'paid';

    public function save($runValidation=true,$attributes=null) {
        if ($this->amount <=0) {
            throw new Exception('Цена не может быть 0 или меньше');
        }
        return parent::save($runValidation, $attributes);
    }

}