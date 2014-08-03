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
        if (isset($_POST['Image'])) {
            $image->attributes = $_POST['Image'];
            if (!$image->save()) {
                Yii::app()->user->setFlash('error','Ошибка сохранения фотографии: '.$image->getErrorsAsText());
            } else {
                Yii::app()->user->setFlash('success','Параметры фотографий сохранены');
            }
            $this->redirect(array('update','id' => $id));
        }
        $this->render('update',array('image' => $image));
    }

    public function actionDelete($id) {
        $image = self::loadModel($id);
        $image->delete();
        $this->redirect(array('album/view','id' => $image->album_id));
    }

    public static function loadModel($imageId) {
        /** @var Image $image */
        $image = Image::model()->findByPk($imageId);
        if (!$image) {
            throw new Exception('Изображение не найдено');
        }
        $album = AlbumController::loadModel($image->album_id);
        if (!$album) {
            throw new Exception('Нет доступа к корзине');
        }
        return $image;
    }

}