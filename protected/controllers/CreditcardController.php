<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.11.2014
 * Time: 13:00
 */
class CreditcardController extends Controller {

    /*
        К этому методу обращается робокасса после завершения интерактива
        с пользователем. Это может произойти мгновенно либо в течение нескольких
        минут. Здесь следует отметить счет как оплаченный либо обработать
        отказ от оплаты.
    */
    public function actionResult() {
        $robokassa = Yii::app()->robokassa;
        // Коллбэк для события "оплата произведена"
        $robokassa->onSuccess = function($event){
            $transaction = Yii::app()->db->beginTransaction();
            // Отмечаем время оплаты счета
            $InvId = Yii::app()->request->getParam('InvId');
            $invoice = Invoice::model()->findByPk($InvId);
            $invoice->paid = new CDbExpression('NOW()');
            $invoice->progress = Invoice::PROGRESS_PAID;
            $invoice->cart->progress = Cart::PURCHASED;
            if (!$invoice->save() || !$invoice->cart->save()) {
                $transaction->rollback();
                throw new CException("Unable to mark Invoice #$InvId as paid.\n"
                    . $invoice->getErrorsAsText().';'.$invoice->cart->getErrorsAsText());
            }
            $transaction->commit();
        };

        // Коллбэк для события "отказ от оплаты"
        $robokassa->onFail = function($event) use ($robokassa) {
            // Например, удаляем счет из базы
            $InvId = Yii::app()->request->getParam('InvId');
            $invoice = Invoice::model()->findByPk($InvId);
            if ($invoice) {
                $invoice->description = $robokassa->params['reason'];
                //$invoice->delete();
                $invoice->save();
            }
        };

        // Обработка ответа робокассы
        $robokassa->result();
        die();
    }
}