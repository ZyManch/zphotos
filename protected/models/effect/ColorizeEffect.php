<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 03.11.2014
 * Time: 16:33
 * @property $grayscale
 * @property $colorize
 */
class ColorizeEffect extends AbstractEffect {

    public function applyForGd($gd,ImageEffect $params,$mode = self::MODE_PREVIEW) {
        if ($this->grayscale) {
            imagefilter($gd, IMG_FILTER_GRAYSCALE);
        }
        $colorize = $this->getParam('colorize');
        if ($colorize) {
            imagefilter(
                $gd,
                IMG_FILTER_COLORIZE,
                $colorize['red'],
                $colorize['green'],
                $colorize['blue']
            );
        }
    }

}