<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 10:59
 */
class Good extends CGood {

    const DEFAULT_UPLOAD_GOOD_ID = 1;
    const TYPE_SIMPLE = 'simple';
    const TYPE_PRINT = 'print';

    protected function instantiate($attributes) {
        /** @var CGood $model */
        switch ($attributes['type']) {
            case self::TYPE_SIMPLE:
                $model = new GoodSimple(null);
                break;
            case self::TYPE_PRINT:
                $model = new GoodPrint(null);
                break;
            default:
                throw new Exception('Wrong type');
        }
        return $model;
    }

    /**
     * @param $categoryId
     * @return Category|null
     */
    public function getCategory($categoryId) {
        if (!$categoryId) {
            return null;
        }
        foreach ($this->categories as $category) {
            if ($category->id == $categoryId) {
                return $category;
            }
        }
        return null;
    }

    /**
     * @return GoodMedia[]
     */
    public function getMedias() {
        $result = array();
        foreach ($this->goodMedias as $media) {
            if (true || $this->good_media_id != $media->id) {
                $result[] = $media;
            }
        }
        return $result;
    }

}