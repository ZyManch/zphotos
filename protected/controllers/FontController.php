<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 17.09.14
 * Time: 9:01
 */
class FontController extends Controller {

    public function actionPreview($id) {
        $font = self::loadModel($id);
        $gd = $font->getGd(16,$font->title);
        header("Content-type: image/png");
        imagepng($gd);
    }

    /**
     * @param $fontId
     * @return Font
     * @throws Exception
     */
    public static function loadModel($fontId) {
        /** @var Font $font */
        $font = Font::model()->findByPk($fontId);
        if (!$font) {
            throw new Exception('Шрифт не найден');
        }
        return $font;
    }
}