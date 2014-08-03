<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 10:59
 */
abstract class GoodModel extends Good {

    abstract function getDefaultMediaTitle();

    abstract function getBuyButton(Controller $controller);

}