<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 11:12
 */
class PaymentController extends Controller {


    public function actionIndex() {
        $deliveries = Delivery::model()->getByCity(1);
        $this->render('index',array('deliveries'=>$deliveries));
    }

    public function actionDelivery($id) {

    }
    /*
        Всё начинается здесь. Заводим в базе запись с новым выставленным счетом,
        и передаем компоненту его ID, сумму, краткое описание и опционально
        e-mail пользователя. Можно не выносить эти данные в отдельную модель,
        а использовать атрибуты оформленного пользователем заказа
        (для интернет-магазинов).
    */
    public function actionCreditcard() {
        // Выставляем счет
        $cart = Cart::getCurrent(true);
        if (!$cart) {
            $this->redirect(array('cart/index'));
        }
        $invoice = new Invoice;
        $invoice->user_id = Yii::app()->user->id;
        $invoice->cart_id = $cart->id;
        $invoice->amount = $cart->getTotalPrice();
        if ($invoice->save()) {
            // Компонент переадресует пользователя в свой интерфейс оплаты
            Yii::app()->robokassa->pay(
                 $invoice->amount,
                 $invoice->id,
                 $cart->title,
                 Yii::app()->user->getUser()->email
            );
        } else {
            throw new Exception($invoice->getErrorsAsText());
        }
    }

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

    /*
        Сюда из робокассы редиректится пользователь
        в случае отказа от оплаты счета.
    */
    public function actionFailure() {
        Yii::app()->user->setFlash('error', 'Отказ от оплаты. Если вы столкнулись
            с трудностями при внесении средств на счет, свяжитесь
            с нашей технической поддержкой.');

        $this->redirect(array('cart/view'));
    }

    /*
        Сюда из робокассы редиректится пользователь в случае успешного проведения
        платежа. Обратите внимание, что на этот момент робокасса возможно еще
        не обратилась к методу actionResult() и нам неизвестно, поступили средства
        на счет или нет.
    */
    public function actionSuccess() {
        $InvId = Yii::app()->request->getParam('InvId');
        $invoice = Invoice::model()->findByPk($InvId);
        if ($invoice) {
            if ($invoice->paid) {
                // Если робокасса уже сообщила ранее, что платеж успешно принят
                Yii::app()->user->setFlash('success','Ваш платеж принят. Спасибо.');
            } else {
                // Если робокасса еще не отзвонилась
                Yii::app()->user->setFlash(
                    'success',
                    'Ваш платеж принят. Товар будет оплачен в течении нескольких минут. Спасибо.'
                );
            }
        } else {
            throw new Exception('Оплата не найдена');
        }

        $this->redirect(array('cart/index'));
    }

}