<?php
class Font extends CFont {

    protected static $_variants;

    public function getFontPath() {
        $path = HOME.'fonts/'.$this->filename;
        return $path;
    }

    public static function getVariants() {
        if (!is_null(self::$_variants)) {
            return self::$_variants;
        }
        $list = Font::model()->findAll(array('order' => 'title ASC'));
        self::$_variants = CHtml::listData($list,'id','title');
        return self::$_variants;
    }

    public function getGd($fontSize, $text) {
        $box = imagettfbbox($fontSize,0,$this->getFontPath(),$text);
        $width = $box[2] - $box[6];
        $height = $box[3] - $box[7];
        $gd = imagecreatetruecolor($width, $height);
        $textColor = imagecolorallocate($gd,0,0,0);
        $bgColor = imagecolorallocate($gd,253,255,254);
        imagecolortransparent($gd, $bgColor);
        imagefill($gd,1,1,$bgColor);
        imagettftext($gd,$fontSize,0,-$box[6],-$box[7],$textColor,$this->getFontPath(),$text);
        return $gd;
    }
}