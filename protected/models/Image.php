<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 12:13
 */
class Image extends CImage {

    const ORIENTATION_HORIZONTAL = 'Horizontal';
    const ORIENTATION_VERTICAL = 'Vertical';

    public function fillAutoMargin() {
        if ($this->width > $this->height) {
            $this->orientation = self::ORIENTATION_HORIZONTAL;
            $margin = $this->_getMargin($this->width, $this->height);
            $this->margin_top = $margin[1];
            $this->margin_bottom = $margin[1];
            $this->margin_left = $margin[0];
            $this->margin_right = $margin[0];
        } else {
            $this->orientation = self::ORIENTATION_VERTICAL;
            $margin = $this->_getMargin($this->width, $this->height);
            $this->margin_top = $margin[0];
            $this->margin_bottom = $margin[0];
            $this->margin_left = $margin[1];
            $this->margin_right = $margin[2];
        }
    }

    /**
     * @param $wide
     * @param $narrow
     * @return array [margin for wide, margin for narrow]
     */
    protected function _getMargin($wide, $narrow) {
        if ($wide / 15 < $narrow / 10) {
            return array(
                0, // margin_for_wide
                ceil(($narrow - $wide * 10 / 15)/2)
            );
        } else {
            return array(
                ceil(($wide - $narrow * 15 / 10)/2),
                0
            );
        }
    }

}