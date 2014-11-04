<?php

/**
 * Class ImageEffect
 * @property AbstractEffect $effect
 */
class ImageEffect extends CImageEffect {

    protected function instantiate($attributes) {
        $effects = Effect::getAvailableEffects();
        $class = ucfirst($effects[$attributes['effect_id']]->name).'ImageEffect';
        if(!class_exists($class)) {
            return new ImageEffect(null);
        }
        return new $class(null);
    }

    public function applyForGd($gd,$mode = Effect::MODE_PREVIEW) {
        $this->effect->applyForGd(
            $gd,
            $this,
            $mode
        );
    }

    public function setParams($params) {
        $this->params = $params ? json_encode($params) : null;
    }

    public function __get($name) {
        if ($this->params) {
            $params = json_decode($this->params,1);
            if (isset($params[$name])) {
                return $params[$name];
            }
        }
        return parent::__get($name);
    }

}