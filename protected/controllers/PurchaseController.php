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
        if (isset($_POST['albums'])) {
            var_dump($_POST['albums']);die();
        }
        if ($id) {
            $album = AlbumController::loadModel($id);
        }
        $albums = Yii::app()->user->getUser()->getAlbumProvider('Filling');
        $this->render('create',array('albums' => $albums,'album_id' => $id));
    }
}

