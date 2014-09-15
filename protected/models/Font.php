<?php
class Font extends CFont {

    protected static $_variants;

    public function getFontPath() {
        $path = Yii::getPathOfAlias('root').'/fonts/'.$this->filename;
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
}