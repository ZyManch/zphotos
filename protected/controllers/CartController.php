<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 13:28
 */
class CartController extends Controller {




    public function actionUpload() {
        $form = new UploadForm();
        $form->images = CUploadedFile::getInstancesByName('images');;
        if ($form->validate() && $form->upload()) {
            print CHtml::normalizeUrl(array('/cart/view','id' => $form->cart_id));
        } else {
            print $form->getError('images');
        }
    }

    public function actionView($id) {

        $cart = self::loadModel($id);
        $this->render('view',array('model' => $cart));
    }

    public function actionDelete($id) {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * @param $cartId
     * @throws Exception
     */
    public static function loadModel($cartId) {
        /** @var Cart $cart */
        $cart = Cart::model()->findByPk($cartId);
        if (!$cart) {
            throw new Exception('Галерея не найдена');
        }
        if ($cart->user_id != Yii::app()->user->id) {
            throw new Exception('Доступ запрещен');
        }
        return $cart;
    }
}