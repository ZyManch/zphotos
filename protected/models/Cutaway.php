<?php
class Cutaway extends CCutaway {

    public function getFileDir() {
        return 'images/cutaway/';
    }

    public function getFilePath($side) {
        return $this->getFileDir().$this->cutawayTemplate->filename;
    }

    protected function _getGd($side) {
        $filePath = $this->getFilePath($side);
        if  (!file_exists($filePath)) {
            throw new Exception('Не найдена '.($side?'передняя':'задняя').' сторона визитки');
        }
        return imagecreatefromjpeg($filePath);
    }

    public function getPreviewGd($side, $sourceWidth, $withText) {
        $gd = $this->_getGd($side);
        $desWidth = $this->cutawayTemplate->width;
        $desHeight = $this->cutawayTemplate->height;
        $zoom = $sourceWidth / $desWidth;
        $sourceHeight = round($zoom * $desHeight);
        $newGd = imagecreatetruecolor($sourceWidth, $sourceHeight);
        imagecopyresampled($newGd,$gd,0,0,0,0,$sourceWidth, $sourceHeight,$desWidth,$desHeight);
        if ($withText) {
            foreach ($this->cutawayTexts as $cutawayText) {
                $color = $cutawayText->getColorText($gd);
                imagettftext(
                    $newGd,
                    round($cutawayText->fontsize*$zoom),
                    0,
                    round($cutawayText->x*$zoom),
                    round($cutawayText->y*$zoom),
                    $color,
                    $cutawayText->font->getFontPath(),
                    $cutawayText->label
                );
            }
        }
        return $newGd;
    }

}