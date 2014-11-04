<?php
class Effect extends CEffect {

    const CROP_EFFECT_ID = 1;

    const YES = 'Yes';
    const NO = 'No';

    const MODE_PREVIEW = 'preview';
    const MODE_UPDATE = 'update';
    const MODE_PRINT = 'print';

    protected static $_effects;

    public function getParam($name) {
        if (!$this->params) {
            return null;
        }
        $params = json_decode($this->params,true);
        if (!isset($params[$name])) {
            return null;
        }
        return $params[$name];
    }

    /**
     * @return Effect[]
     */
    public static function getAvailableEffects() {
        if (!is_null(self::$_effects)) {
            return self::$_effects;
        }
        self::$_effects = self::model()->findAll(array('index'=>'id','order'=>'`group` ASC'));
        return self::$_effects;
    }

    protected function instantiate($attributes) {
        $class = ucfirst($attributes['name']).'Effect';
        if(!class_exists($class)) {
            throw new Exception('Не найден обработчик эффекта '.$class);
        }
        return new $class(null);
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