<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 03.11.2014
 * Time: 16:45
 */
abstract class AbstractEffect extends Effect {

    protected $_canMergeEffect = false;

    abstract public function applyForGd($gd,ImageEffect $params,$mode = self::MODE_PREVIEW);

    public function applyForImage(Image $image) {
        if ($image->hasEffectGroup($this->group)) {
            $this->_addForImage($image);
        } else {
            $this->_createForImage($image);
        }
    }

    abstract public function getIcon();

    protected function _createForImage(Image $image) {
        $imageEffect = new ImageEffect();
        $imageEffect->image_id = $image->id;
        $imageEffect->effect_id = $this->id;
        $params = $this->_updateParams(null);
        $imageEffect->setParams($params);
        if (!$imageEffect->save()) {
            throw new Exception('Ошибка сохранения эффекта: '.$imageEffect->getErrorsAsText());
        }
    }

    protected function _addForImage(Image $image) {
        $imageEffect = $image->getImageEffectByGroup($this->group);
        if ($imageEffect->effect->name != $this->name || !$this->_canMergeEffect) {
            $imageEffect->delete();
            $this->_createForImage($image);
        } else {
            $params = $this->_updateParams(
                $imageEffect->params ? json_decode($imageEffect->params,1):null
            );
            $imageEffect->setParams($params);
            if (!$imageEffect->save()) {
                throw new Exception('Ошибка сохранения эффекта: '.$imageEffect->getErrorsAsText());
            }
        }
    }

    protected function _updateParams($oldParams) {
        return null;
    }
}