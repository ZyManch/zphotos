<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 03.11.2014
 * Time: 16:37
 * @property $left
 * @property $right
 * @property $top
 * @property $bottom
 */
class CropImageEffect extends ImageEffect {




    public function getMarginLeft($height) {
        return round($this->left * $height / $this->image->height);
    }

    public function getMarginRight($height) {
        return round($this->right * $height / $this->image->height);
    }

    public function getMarginTop($height) {
        return round($this->top * $height / $this->image->height);
    }

    public function getMarginBottom($height) {
        return round($this->bottom * $height / $this->image->height);
    }

    public function fillAutoMargin() {
        $image = $this->image;
        if ($image->width > $image->height) {
            $margin = $this->_getMargin($image->width, $image->height);
            $this->setParams(array(
                'top' => $margin[1],
                'bottom' => $margin[1],
                'left' => $margin[0],
                'right' => $margin[0]
            ));
        } else {
            $margin = $this->_getMargin($image->height, $image->width);
            $this->setParams(array(
                'top' => $margin[0],
                'bottom' => $margin[0],
                'left' => $margin[1],
                'right' => $margin[1]
            ));
        }
        if (!$this->save()) {
            throw new Exception('Ошибка сохранения отступов:'.$this->getErrorsAsText());
        }
    }


    /**
     * @param $wide
     * @param $narrow
     * @return array [margin for wide, margin for narrow]
     */
    protected function _getMargin($wide, $narrow) {
        $format = $this->image->album->good->printFormat;
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