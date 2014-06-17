<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 18:43
 */
class ImageController extends Controller {


    public function actionPreview($id) {
        $image = self::loadModel($id);
        $gd = $image->getPreviewGd();

        header("Content-type: image/png");
        imagepng($gd);
    }

    public function actionView($id) {
        $image = self::loadModel($id);
        $gd = $image->getViewGd();

        header("Content-type: image/png");
        imagepng($gd);
    }

    public function actionUpdate($id) {
        $image = self::loadModel($id);
        $this->render('update',array('image' => $image));
    }

    public function actionDelete($id) {
        $image = self::loadModel($id);
        $image->delete();
        $this->redirect(array('cart/view','id' => $image->cart_id));
    }

    public static function loadModel($imageId) {
        /** @var Image $image */
        $image = Image::model()->findByPk($imageId);
        if (!$image) {
            throw new Exception('Изображение не найдено');
        }
        $cart = CartController::loadModel($image->cart_id);
        if (!$cart) {
            throw new Exception('Нет доступа к корзине');
        }
        return $image;
    }

}