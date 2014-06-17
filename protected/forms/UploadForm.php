<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:15
 */
class UploadForm extends CFormModel {

    /** @var CUploadedFile[] */
    public $images = array();
    public $cart_id;

    public function rules() {
        return array(
            array('images', 'required'),
            array('cart_id', 'numerical', 'integerOnly'=>true),
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


    public function upload() {

        $cart = $this->_getCart();
        foreach ($this->images as $picture) {
            $fileName = 'im'.uniqid().'.'.strtolower($picture->getExtensionName());
            $image = new Image();
            $image->name = $picture->name;
            $image->cart_id = $cart->id;
            $image->filename = $fileName;
            $fileDir = $image->getFileDir();
            if (!file_exists($fileDir)) {
                mkdir($fileDir,0777,true);
            }
            $filePath = $image->getFilePath();
            if ($picture->saveAs($filePath)) {
                $size = getimagesize($filePath);
                $image->width = $size[0];
                $image->height = $size[1];
                $image->fillAutoMargin();
                $image->progress = 'Filling';
                if (!$image->save()) {
                    $this->addError('images','Ошибка сохранения изображения:'.$image->getErrorsAsText());
                }
            }
        }
        return $this->validate();
    }

    protected function _getCart() {
        /** @var Cart $cart */
        $cart = null;
        $user = Yii::app()->user;
        if ($this->cart_id && $user->id) {
            $cart = Cart::model()->findByPk($this->cart_id);
            if (!$cart || $cart->user_id != $user->id) {
                $cart = null;
            }
        }
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user->getUserOrRegisterTemporary()->id;
            $cart->name = 'Фотографии '.date('Y-m-d');
            if (!$cart->save()) {
                throw new Exception('Ошибка создания альбома:'.$cart->getErrorsAsText());
            }
            $this->cart_id = $cart->id;
        }
        return $cart;
    }
}