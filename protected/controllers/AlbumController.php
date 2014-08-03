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