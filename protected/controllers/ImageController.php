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