<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:23
 */
class PurchaseController extends Controller {

    public function init() {
        if (Yii::app()->user->getIsGuest()) {
            $this->redirect(array('site/index'));
        }
        parent::init();
    }


    public function actionCreate($id = null) {
        $model = new Purchase();
        if (isset($_POST['carts'])) {
            var_dump($_POST['carts']);die();
        }
        if ($id) {
            $cart = CartController::loadModel($id);
        }
        $carts = Yii::app()->user->getUser()->getCartProvider('Filling');
        $this->render('create',array('carts' => $carts,'cart_id' => $id));
    }
}

