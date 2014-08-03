<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 15:43
 */
class GoodPrint extends GoodModel {

    function getDefaultMediaTitle() {
        return 'Макет печати';
    }

    function getBuyButton(Controller $controller) {
        return $controller->renderPartial('//upload/form',array(
            'htmlOptions' => array(
                'class'    => 'upload-image btn btn-primary',
            ),
            'goodId' => $this->id,
            'uploadId' => 'upload_button',
            'errorId'  => 'info_box',
            'text' => 'Загрузить фотографии и распечатать'
        ), true);

    }

    public static function getVariants() {
        $results = self::model()->findAll(array(
            'condition' => 'type="print"',
            'order' => 'title ASC'
        ));
        return CHtml::listData($results,'id','title');
    }
}