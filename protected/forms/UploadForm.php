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
    public $album_id;
    public $good_id;

    public function rules() {
        return array(
            array('images,good_id', 'required'),
            array('album_id,good_id', 'numerical', 'integerOnly'=>true),
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

        $album = $this->_getAlbum();
        foreach ($this->images as $picture) {
            $fileName = 'im'.uniqid().'.'.strtolower($picture->getExtensionName());
            $image = new Image();
            $image->name = $picture->name;
            $image->album_id = $album->id;
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

    protected function _getAlbum() {
        /** @var Album $album */
        $album = null;
        $user = Yii::app()->user;
        if ($this->album_id && $user->id) {
            $album = Album::model()->findByPk($this->album_id);
            if (!$album || $album->user_id != $user->id) {
                $album = null;
            }
        }
        if (!$album) {
            $album = new Album();
            $album->user_id = $user->getUserOrRegisterTemporary()->id;
            $album->good_id = $this->good_id;
            $album->name = 'Фотографии '.date('Y-m-d');
            if (!$album->save()) {
                throw new Exception('Ошибка создания альбома:'.$album->getErrorsAsText());
            }
            $this->album_id = $album->id;
        }
        return $album;
    }
}