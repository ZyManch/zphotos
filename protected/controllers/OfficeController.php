<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 17:57
 */
class OfficeController extends Controller {

    public function actionView($id) {
        $office = self::loadModel($id);
        $this->render('view',array('office'=>$office));
    }

    public function actionIndex() {
        $offices = Office::model()->findAll(array(
            'with' => array('city'),
            'order'=>'city.name ASC, t.id ASC'
        ));
        $this->render('index',array('offices'=>$offices));
    }


    public static function loadModel($officeId) {
        /** @var Office $office */
        $office = Office::model()->findByPk($officeId);
        if (!$office) {
            throw new Exception('Офис не найден');
        }
        return $office;
    }
}