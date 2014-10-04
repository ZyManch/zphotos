<?php

/**
 * Class CutawayTemplate
 * @property GoodCutaway $good
 */
class CutawayTemplate extends CCutawayTemplate {

    public function createCutaway(GoodCutaway $good) {
        $cutaway = new Cutaway();
        $cutaway->cutaway_template_id = $this->id;
        $cutaway->user_id = Yii::app()->user->id;
        $cutaway->good_id = $good->id;
        if (!$cutaway->save()) {
            throw new Exception('Ошибка создания новой визитки');
        }
        foreach ($this->cutawayTemplateTexts as $cutawayTemplateText) {
            $cutawayText  = new CutawayText();
            $cutawayText->cutaway_id = $cutaway->id;
            $cutawayText->cutaway_template_text_id = $cutawayTemplateText->id;
            $cutawayText->label = $cutawayTemplateText->label;
            $cutawayText->fontsize = $cutawayTemplateText->fontsize;
            $cutawayText->color = $cutawayTemplateText->color;
            $cutawayText->font_id = $cutawayTemplateText->font_id;
            $cutawayText->x = $cutawayTemplateText->x;
            $cutawayText->y = $cutawayTemplateText->y;
            $cutawayText->orientation = $cutawayTemplateText->orientation;
            if (!$cutawayText->save()) {
                throw new Exception('Ошибка сохранения текста для визитки');
            }
        }
        return $cutaway;
    }

    public function getGd($width, $withText = true) {
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
        $height = round($width * $this->height / $this->width);
        $newGd = imagecreatetruecolor($width, $height);
        imagecopyresampled($newGd,$gd,0,0,0,0,$width,$height,$this->width,$this->height);
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