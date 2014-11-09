<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:23
 */
class CartController extends Controller {

    public function init() {
        if (Yii::app()->user->getIsGuest()) {
            $this->redirect(array('site/index'));
        }
        parent::init();
    }

    public function actionIndex() {
        $this->render('index',array('items' => Cart::getCarts(array(Cart::FILLING))));
    }

    public function actionAdd($id = null, $resource_id = null, $count = 1, $redirect = '') {
        $cart = Cart::getCurrent(true);
        if (!$cart) {
            throw new Exception('Корзина не найдена');
        }
        $good = GoodController::loadModel($id);
        if ($cart->addGood($good,$count, $resource_id)) {
            Yii::app()->user->setFlash('success','Товар добавлен в '.CHtml::link('корзину',array('cart/view')));
        } else {
            Yii::app()->user->setFlash('error','Ошибка добавления товара в корзину');
        }
        if (!$redirect) {
            $redirect = CHtml::normalizeUrl(array('cart/view'));
        }
        $this->redirect($redirect);

    }

    public function actionChangeField() {
        $request = Yii::app()->request;
        $pk = $request->getParam('pk');
        $name = $request->getParam('name');
        $value = $request->getParam('value');
        if (!$pk || !$name || !$value) {
            throw new Exception('Некорректный запрос.');
        }
        /** @var CartHasGood $cartHasGood */
        $cartHasGood = CartHasGood::model()->findByPk($pk);
        if (!$cartHasGood) {
            throw new Exception('Корзина не найдена');
        }
        $cart = $cartHasGood->cart;
        if ($cart->progress != Cart::FILLING || $cart->user_id != Yii::app()->user->id) {
            throw new Exception('Нет доступа редактировать корзину');
        }
        switch ($name) {
            case 'count':
                $delta = $value-$cartHasGood->count;
                if ($delta > 0) {
                    $cart->addGood($cartHasGood->good,$delta,$cartHasGood->resource_id);
                } else {
                    $cart->removeGood($cartHasGood->good,-$delta,$cartHasGood->resource_id);
                }
                break;
            default:
                throw new Exception('Корзина не найдена');
        }
    }

    public function actionView() {
        $cart = Cart::getCurrent(true);
        if (!$cart) {
            $this->redirect(array('cart/index'));
        }
        $this->render('view',array('model' => $cart));
    }


    public static function loadModel($id, $with = array()) {
        /** @var Cart $model */
        $model = Cart::model()->with($with)->findByPk($id);
        if($model===null) {
            throw new CHttpException(404, 'Корзина не найден.');
        }
        if ($model->user_id != Yii::app()->user->id) {
            throw new CHttpException(404,'У вас нет доступа просматривать данную страницу');
        }
        return $model;
    }
}

