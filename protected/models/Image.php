<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:13
 */
class Image extends CImage {

    const ORIENTATION_HORIZONTAL = 'Horizontal';
    const ORIENTATION_VERTICAL = 'Vertical';

    const PREVIEW_HEIGHT = 200;
    const VIEW_WIDTH = 720;

    protected $_crop;


    public function save($runValidation=true,$attributes=null) {
        $isNew = $this->isNewRecord;
        $this->orientation = ($this->width > $this->height ?
            Image::ORIENTATION_HORIZONTAL :
            Image::ORIENTATION_VERTICAL);
        if (!parent::save($runValidation, $attributes)) {
            return false;
        }
        if ($isNew) {
            foreach ($this->album->getCartHasGoods() as $cartHasGood) {
                $cartHasGood->save();
            }
        }
        return true;
    }

    public function delete() {
        if (!parent::delete()) {
            return false;
        }
        foreach ($this->album->getCartHasGoods() as $cartHasGood) {
            $cartHasGood->save();
        }
        return true;
    }
    /**
     * @return resource
     * @throws Exception
     */
    public function getGd() {
        return self::_getGdFromFilename($this->getFilePath());
    }

    protected static function _getGdFromFilename($filePath) {
        $extension = pathinfo($filePath,PATHINFO_EXTENSION);
        if (!file_exists($filePath)) {
            throw new Exception('Фотография не найдена');
        }
        switch ($extension) {
            case 'jpeg':case 'jpg':
            return imagecreatefromjpeg($filePath);
            break;
            case 'png':
                return imagecreatefrompng($filePath);
                break;
            case 'gif':
                return imagecreatefromgif($filePath);
                break;
            default:
                throw new Exception('Неизвестный формат изображения');
        }
    }

    public function getPreviewGd() {
        $previewFilename = $this->getPreviewPath();
        $canUseCache = Yii::app()->params['can_use_image_cache'];
        if ($canUseCache && file_exists($previewFilename)) {
            return $this->_getGdFromFilename($previewFilename);
        }
        $gd = $this->getGd();
        $newHeight = self::PREVIEW_HEIGHT;
        $resize = $newHeight / $this->height;
        $newWidth = $resize * $this->width;
        $newGd = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newGd, $gd, 0,0,0,0,$newWidth, $newHeight, $this->width, $this->height);
        $this->_applyEffects($newGd, Effect::MODE_PREVIEW);
        if ($canUseCache) {
            imagepng($newGd, $previewFilename);
        }
        return $newGd;
    }


    public function getViewGd() {
        $viewFilename = $this->getViewPath();
        $canUseCache = Yii::app()->params['can_use_image_cache'];
        if ($canUseCache && file_exists($viewFilename)) {
            return $this->_getGdFromFilename($viewFilename);
        }
        $gd = $this->getGd();
        $newWidth = self::VIEW_WIDTH;
        $resize = $newWidth / $this->width;
        $newHeight = $resize * $this->height;
        $newGd = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newGd, $gd, 0,0,0,0,$newWidth, $newHeight, $this->width, $this->height);
        $this->_applyEffects($newGd, Effect::MODE_UPDATE);
        if ($canUseCache) {
            imagepng($newGd, $viewFilename);
        }
        return $newGd;
    }

    protected function _applyEffects($gd, $mode = Effect::MODE_PREVIEW) {
        foreach ($this->imageEffects as $imageEffect) {
            $imageEffect->applyForGd($gd, $mode);
        }
    }

    public function getFilePath() {
        return $this->getFileDir().$this->filename;
    }

    public function getPreviewPath() {
        return $this->getFileDir().pathinfo($this->filename, PATHINFO_BASENAME).'_preview.png';
    }

    public function getViewPath() {
        return $this->getFileDir().pathinfo($this->filename, PATHINFO_BASENAME).'_view.png';
    }

    public function getFileDir() {
        return Yii::getPathOfAlias('photos').'/'.$this->album->user->id.'/'.$this->album_id.'/';
    }



    public function hasEffect($effectId) {
        foreach ($this->imageEffects as $imageEffect) {
            if ($imageEffect->effect_id == $effectId) {
                return true;
            }
        }
        return false;
    }

    public function hasEffectGroup($group) {
        foreach ($this->imageEffects as $imageEffect) {
            if ($imageEffect->effect->group == $group) {
                return true;
            }
        }
        return false;
    }

    public function getImageEffect($effectId) {
        foreach ($this->imageEffects as $imageEffect) {
            if ($imageEffect->effect_id == $effectId) {
                return $imageEffect;
            }
        }
        return null;
    }

    public function getImageEffectByGroup($group) {
        foreach ($this->imageEffects as $imageEffect) {
            if ($imageEffect->effect->group == $group) {
                return $imageEffect;
            }
        }
        return null;
    }

    /**
     * @return CropImageEffect
     */
    public function getCropEffect() {
        if (!is_null($this->_crop)) {
            return $this->_crop;
        }
        $this->_crop = $this->getImageEffect(Effect::CROP_EFFECT_ID);
        if ($this->_crop) {
            return $this->_crop;
        }
        $this->_crop = new CropImageEffect();
        $this->_crop->effect_id = Effect::CROP_EFFECT_ID;
        $this->_crop->image_id = $this->id;
        if (!$this->_crop->save()) {
            throw new Exception('Ошибка создания среза:' . $this->_crop->getErrorsAsText());
        }
        $this->getRelated('imageEffects',true);
        return $this->_crop;
    }

}