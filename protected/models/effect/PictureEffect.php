<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 03.11.2014
 * Time: 16:34
 */
class PictureEffect extends AbstractEffect {

    public function applyForGd($gd,ImageEffect $params,$mode = self::MODE_PREVIEW) {
        imagefilter($gd, IMG_FILTER_MEAN_REMOVAL);
        imagefilter($gd, IMG_FILTER_GAUSSIAN_BLUR);
    }

    public function getIcon() {
        return CHtml::tag('span',array('class'=>'glyphicon glyphicon-picture'));
    }

}