<?php
class CutawayTemplateText extends CCutawayTemplateText {


    public static function getDefaultValues() {
        return array(
            'label' => 'Text',
            'fontsize' => 60,
            'color' => '000000',
            'font_id' => 1,
            'orientation' => 'left',
            'x' => 10,
            'y' => 10
        );
    }

    public static function getFieldsForCopy() {
        return array_keys(self::getDefaultValues());
    }

    public function getColorText($gd) {
        return imagecolorallocate($gd, $this->getRedAsDec(), $this->getGreenAsDec(), $this->getBlueAsDec());
    }

    public function getRedAsDec() {
        return hexdec(substr($this->color,0,2));
    }

    public function getGreenAsDec() {
        return hexdec(substr($this->color,2,2));
    }

    public function getBlueAsDec() {
        return hexdec(substr($this->color,4,2));
    }
}