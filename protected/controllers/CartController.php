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

    public function actionView() {
        $cart = Cart::getCurrent(true);
        if (!$cart) {
            $this->redirect(array('cart/index'));
        }
        $this->render('view',array('model' => $cart));
    }


    public static function loadModel($id, $with = array()) {
        $model = Cart::model()->with($with)->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}

