<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 13:28
 */
class AlbumController extends Controller {


    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $albums = new CArrayDataProvider(array());
        } else {
            $albums = Yii::app()->user->getUser()->getAlbumProvider();
        }
        $this->render('index',array('albums' => $albums));
    }



    public function actionUpload($id = null, $good_id = null) {
        foreach (Yii::app()->log->getRoutes() as $route) {
            $route->enabled = false;
        }
        $form = new UploadForm();
        $form->images = CUploadedFile::getInstancesByName('images');
        $form->good_id = $good_id ? $good_id : Good::DEFAULT_UPLOAD_GOOD_ID;
        $form->album_id = $id;
        if ($form->validate() && $form->upload()) {
            print CHtml::normalizeUrl(array('album/view','id' => $form->album_id));
        } else {
            print $form->getError('images');
        }
    }

    public function actionView($id) {

        $album = self::loadModel($id);
        $this->render('view',array('model' => $album));
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

    public function actionReset($id, $image_id = null) {
        $album = $this->loadModel($id);
        foreach ($album->images as $image) {
            if (!$image_id || $image_id == $image->id) {
                $image->getCropEffect()->fillAutoMargin();
                if (!$image->save()) {
                    throw new Exception('Ошибка сброса отступов');
                }
            }
        }
        if ($image_id) {
            $this->redirect(array('image/update','id' => $image_id));
        } else {
            $this->redirect(array('album/view','id' => $album->id));
        }
    }

    public function actionChangeField() {
        $request = Yii::app()->request;
        $pk = $request->getParam('pk');
        $name = $request->getParam('name');
        $value = $request->getParam('value');
        if (!$pk || !$name || !$value) {
            throw new Exception('Некорректный запрос.');
        }
        $album = self::loadModel($pk);
        switch ($name) {
            case 'good_id':
                /** @var Good $good */
                $good = GoodController::loadModel($value);
                if (!$good || $good->type != Good::TYPE_PRINT) {
                    throw new Exception('Товар не найден');
                }
                if (!$album->changeGood($good)) {
                    throw new Exception('Ошибка сохранения альбома: '.$album->getErrorsAsText());
                }
                break;
        }
    }

    /**
     * @param $albumId
     * @throws Exception
     */
    public static function loadModel($albumId) {
        /** @var Album $album */
        $album = Album::model()->findByPk($albumId);
        if (!$album) {
            throw new Exception('Галерея не найдена');
        }
        if ($album->user_id != Yii::app()->user->id) {
            throw new Exception('Доступ запрещен');
        }
        return $album;
    }
}