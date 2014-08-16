<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 10:59
 */
class Good extends CGood {

    const COUNT_TOTAL = 'count_total';
    const COUNT_AVAILABLE = 'count_available';
    const COUNT_LOCKED = 'count_locked';

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

    public function getAvatarMediaPath() {
        return GoodMedia::FILE_PATH.($this->goodMedia ? $this->goodMedia->filename : GoodMedia::DEFAULT_IMAGE);
    }

    public function getCount($countType = self::COUNT_TOTAL) {
        $count = 0;
        foreach ($this->goodCounts as $goodCount) {
            $count+=$goodCount->$countType;
        }
        return $count;
    }

    public function getTotalPriceForCount($count) {
        $totalPrice = 0;
        foreach ($this->goodPrices as $goodPrice) {
            if ($goodPrice->count >= $count || is_null($goodPrice->count)) {
                $totalPrice = $count * $goodPrice->price;
            }
        }
        return $totalPrice;
    }

}