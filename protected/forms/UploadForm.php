<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:15
 */
class UploadForm extends CFormModel {

    public $images = array();

    public function rules() {
        return array(
            array('images', 'required'),
            array(
                'images',
                'file',
                'allowEmpty' => false,
                'maxFiles' => 1000,
                'tooMany' => 'Превышено максимальное количество фотографий',
                'maxSize' => 300*(1024*1024),    //10MB
                'tooLarge' => 'Превышено максимальный размер всех фотографий',
                'types' => $this->getAvailableExtensions(),
                'wrongType' => 'Неизевстный формат расширений',
            ),
        );
    }

    public function getAvailableExtensions() {
        return array('jpeg','jpg','png');
    }

}