<?php
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