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
            print 'success';
        } else {
            print $form->getError('images');
        }
    }
}