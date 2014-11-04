<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 03.11.2014
 * Time: 16:37
 */
class CropEffect extends AbstractEffect {



    public function applyForGd($gd,ImageEffect $params,$mode = self::MODE_PREVIEW) {
        switch ($mode) {
            case self::MODE_PREVIEW:
                $width = imagesx($gd);
                $height = imagesy($gd);
                $margin = $params->image->getCropEffect();
                $marginLeft = $margin->getMarginLeft($height);
                $marginRight = $margin->getMarginRight($height);
                $marginTop = $margin->getMarginTop($height);
                $marginBottom = $margin->getMarginBottom($height);
                $copyGd = imagecreatetruecolor($width,$height);
                imagecopyresampled($copyGd,$gd,0,0,0,0,$width,$height,$width,$height);
                imagefilter($copyGd,IMG_FILTER_BRIGHTNESS,-100);
                $this->copyBlock($gd,$copyGd,0,0,$marginLeft,$height);
                $this->copyBlock($gd,$copyGd,$width-$marginRight,0,$marginRight,$height);
                $this->copyBlock($gd,$copyGd,$marginLeft,0,$width - $marginRight-$marginLeft,$marginTop);
                $this->copyBlock($gd,$copyGd,$marginLeft,$height-$marginBottom,$width - $marginRight-$marginLeft,$marginBottom);


                break;
            case self::MODE_PRINT:

                break;
        }
    }

    protected function copyBlock($dist,$source,$x,$y,$width,$height) {
        imagecopyresampled($dist,$source,$x,$y,$x,$y,$width,$height,$width,$height);
    }

    public function getIcon() {
        return CHtml::tag('span',array('class'=>'glyphicon glyphicon-resize-small'));
    }

}