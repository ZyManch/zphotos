<?php
class CutawayText extends CCutawayText {


    public function getGd($cutaway_width) {
        $zoom = $cutaway_width / $this->cutaway->cutawayTemplate->width;
        $fontsize = round($this->fontsize * $zoom);
        $box = imagettfbbox($fontsize,0,$this->font->getFontPath(),$this->label);
        $topLeftX = $box[6];
        $topLeftY = $box[7];
        $bottomRightX = $box[2];
        $bottomRightY = $box[3];
        $width = $bottomRightX-$topLeftX;
        $height = $bottomRightY - $topLeftY;
        $gd = imagecreatetruecolor($width, $height);
        $bgColor = imagecolorallocate($gd,253,255,254);
        imagecolortransparent($gd, $bgColor);
        imagefill($gd,0,0,$bgColor);
        $textColor = $this->getColorText($gd);
        imagettftext($gd,$fontsize,0, -$topLeftX,-$topLeftY,$textColor,$this->font->getFontPath(),$this->label);
        return $gd;
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