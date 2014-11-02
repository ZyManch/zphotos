<?php

/**
 * Class CutawayTemplate
 * @property GoodCutaway $good
 */
class CutawayTemplate extends CCutawayTemplate {

    public function createCutaway(GoodCutaway $good) {
        $cutaway = new Cutaway();
        $cutaway->cutaway_template_id = $this->id;
        $cutaway->user_id = Yii::app()->user->getUserOrRegisterTemporary()->id;
        $cutaway->good_id = $good->id;
        if (!$cutaway->save()) {
            throw new Exception('Ошибка создания новой визитки:'.$cutaway->getErrorsAsText());
        }
        foreach ($this->cutawayTemplateTexts as $cutawayTemplateText) {
            $cutawayText  = new CutawayText();
            $cutawayText->cutaway_id = $cutaway->id;
            $cutawayText->cutaway_template_text_id = $cutawayTemplateText->id;
            foreach (CutawayTemplateText::getFieldsForCopy() as $field) {
                $cutawayText->$field = $cutawayTemplateText->$field;
            }
            if (!$cutawayText->save()) {
                throw new Exception('Ошибка сохранения текста для визитки');
            }
        }
        return $cutaway;
    }

    public function getGd($maxSideLength, $withText = true) {
        switch (strtolower(substr($this->filename,-4))) {
            case '.jpg': case 'jpeg':
                $gd = imagecreatefromjpeg(Cutaway::getFileDir().$this->filename);
                break;
            case '.png';
                $gd = imagecreatefrompng(Cutaway::getFileDir().$this->filename);
                break;
            default:
                throw new Exception('Undefined extension for file '.$this->filename);
        }
        if (imagesx($gd) > imagesy($gd)) {
            $width = $maxSideLength;
            $zoom = $width / $this->width;
            $height = round($this->height * $zoom);
        } else {
            $height = $maxSideLength;
            $zoom = $height / $this->height;
            $width = round($this->width * $zoom);
        }
        $newGd = imagecreatetruecolor($width, $height);
        imagecopyresampled($newGd,$gd,0,0,0,0,$width,$height,$this->width,$this->height);
        if ($withText) {
            foreach ($this->cutawayTemplateTexts as $text) {
                $fontsize = round($text->fontsize * $zoom);
                $x = round($text->x * $zoom);
                $y = round($text->y * $zoom);
                $box = imagettfbbox($fontsize, 0, $text->font->getFontPath(), $text->label);
                $topLeftX = $box[6];
                $topLeftY = $box[7];
                $textColor = $text->getColorText($newGd);
                imagettftext($newGd,$fontsize,0, $x-$topLeftX,$y-$topLeftY,$textColor,$text->font->getFontPath(),$text->label);
            }
        }
        return $newGd;
    }

    public function _extendedRelations() {
        return array(
            'good' => array(self::HAS_ONE,'GoodCutaway','source_id','on' => 'good.type="cutaway"')
        );
    }

    public function sideLabel($side) {
        switch ($side) {
            case 0:
                return 'лицевая';
            case 1:
                return 'обратная';
            default:
                return '';
        }
    }

    public function haveSide($side) {
        switch ($side) {
            case 0:
                return (bool)$this->filename;
            case 1:
                return (bool)$this->second_filename;
            default:
                return false;
        }
    }
}