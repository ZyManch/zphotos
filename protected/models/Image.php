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
    const VIEW_WIDTH = 800;


    public function save($runValidation=true,$attributes=null) {
        $isNew = $this->isNewRecord;
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
        if (file_exists($previewFilename)) {
            return $this->_getGdFromFilename($previewFilename);
        }
        $gd = $this->getGd();
        $newHeight = self::PREVIEW_HEIGHT;
        $resize = $newHeight / $this->height;
        $newWidth = $resize * $this->width;
        $newGd = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newGd, $gd, 0,0,0,0,$newWidth, $newHeight, $this->width, $this->height);
        imagepng($newGd, $previewFilename);
        return $newGd;
    }


    public function getViewGd() {
        $viewFilename = $this->getViewPath();
        if (file_exists($viewFilename)) {
            return $this->_getGdFromFilename($viewFilename);
        }
        $gd = $this->getGd();
        $newWidth = self::VIEW_WIDTH;
        $resize = $newWidth / $this->width;
        $newHeight = $resize * $this->height;
        $newGd = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newGd, $gd, 0,0,0,0,$newWidth, $newHeight, $this->width, $this->height);
        imagepng($newGd, $viewFilename);
        return $newGd;
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

    public function fillAutoMargin() {
        if ($this->width > $this->height) {
            $this->orientation = self::ORIENTATION_HORIZONTAL;
            $margin = $this->_getMargin($this->width, $this->height);
            $this->margin_top = $margin[1];
            $this->margin_bottom = $margin[1];
            $this->margin_left = $margin[0];
            $this->margin_right = $margin[0];
        } else {
            $this->orientation = self::ORIENTATION_VERTICAL;
            $margin = $this->_getMargin($this->height, $this->width);
            $this->margin_top = $margin[0];
            $this->margin_bottom = $margin[0];
            $this->margin_left = $margin[1];
            $this->margin_right = $margin[1];
        }
    }

    public function getMarginLeft($height) {
        return round($this->margin_left * $height / $this->height);
    }

    public function getMarginRight($height) {
        return round($this->margin_right * $height / $this->height);
    }

    public function getMarginTop($height) {
        return round($this->margin_top * $height / $this->height);
    }

    public function getMarginBottom($height) {
        return round($this->margin_bottom * $height / $this->height);
    }

    /**
     * @param $wide
     * @param $narrow
     * @return array [margin for wide, margin for narrow]
     */
    protected function _getMargin($wide, $narrow) {
        $format = $this->album->good->print;
        if (!$format) {
            throw new Exception('Формат изображения не найден');
        }
        $wideOriginal =  $format->getWideSide();
        $narrowOriginal =  $format->getNarrowSide();

        if ($wide / $wideOriginal < $narrow / $narrowOriginal) {
            return array(
                0, // margin_for_wide
                ceil(($narrow - $wide * $narrowOriginal / $wideOriginal)/2)
            );
        } else {
            return array(
                ceil(($wide - $narrow * $wideOriginal / $narrowOriginal)/2),
                0
            );
        }
    }

}