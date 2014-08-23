<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 03.08.14
 * Time: 9:36
 */
class PrintFormat extends  CPrintFormat {

    const ORIENTATION_HORIZONTAL = 'horizontal';
    const ORIENTATION_VERTICAL = 'vertical';

    public function getWideSide() {
        return $this->width < $this->height ? $this->height : $this->width;
    }

    public function getNarrowSide() {
        return $this->width < $this->height ? $this->width : $this->height;
    }

    public function getRatio($orientation = self::ORIENTATION_HORIZONTAL) {
        $wide = $this->getWideSide();
        $narrow = $this->getNarrowSide();
        if ($orientation == self::ORIENTATION_HORIZONTAL) {
            return $wide / $narrow;
        } else {
            return $narrow / $wide;
        }
    }
}