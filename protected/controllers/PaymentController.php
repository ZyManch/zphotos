<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 11:12
 */
class PaymentController extends Controller {

    /** @var  Cart */
    protected $_cart;

    public function init() {
        parent::init();
        $this->_cart = Cart::getCurrent();
        if (!$this->_cart) {
            $this->redirect(array('cart/index'));
        }
    }

    public function actionIndex() {
        if (!$this->_cart->delivery_id) {
            $this->redirect(array('payment/delivery'));
        }
        $delivery = $this->_cart->delivery;
        if ($delivery->isNeedAddress() && !$this->_cart->address_id) {
            $this->redirect(array('payment/address'));
        }
        if ($delivery->isNeedOffice() && !$this->_cart->office_id) {
            $this->redirect(array('payment/office'));
        }
        if (!$this->_cart->payment_id) {
            $this->redirect(array('payment/payment'));
        }
        if ($this->_cart->progress == Cart::FILLING) {
            $this->_cart->payment->process($this->_cart);
        }
        $this->redirect(array('cart/index'));
    }

    public function actionDelivery($id = null) {
        $deliveries = Yii::app()->user->getUser()->city->getDeliveries();
        if (Yii::app()->params['auto_select_payment'] && sizeof($deliveries) == 1) {
            $id = array_shift($deliveries)->id;
        }
        if ($id) {
            if (!isset($deliveries[$id])) {
                throw new Exception('Не найден данный способ доставки');
            }
            $this->_cart->delivery_id = $id;
            $this->_cart->save();
            $this->redirect(array('payment/index'));
        } else {
            $this->render('index',array('deliveries'=>$deliveries));
        }
    }

    public function actionOffice($id = null) {
        $offices = $this->_cart->delivery->getOffices(Yii::app()->user->getUser()->city_id);
        if (Yii::app()->params['auto_select_payment'] && sizeof($offices) == 1) {
            $id = array_shift($offices)->id;
        }
        if ($id) {
            if (!isset($offices[$id])) {
                throw new Exception('Не найден офис');
            }
            $this->_cart->office_id = $id;
            $this->_cart->save();
            $this->redirect(array('payment/index'));
        } else {
            $this->render('office', array('offices' => $offices));
        }
    }

    public function actionAddress() {

    }

    public function actionPayment($id = null) {
        $payments = Yii::app()->user->getUser()->city->getPayments();
        if (Yii::app()->params['auto_select_payment'] && sizeof($payments) == 1) {
            $id = array_shift($payments)->id;
        }
        if ($id) {
            if (!isset($payments[$id])) {
                throw new Exception('Не найден способ оплаты');
            }
            $this->_cart->payment_id = $id;
            $this->_cart->save();
            $this->redirect(array('payment/index'));
        } else {
            $this->render('payment', array('payments' => $payments));
        }
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