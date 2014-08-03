<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 15:44
 */
class GoodSimple extends GoodModel {

    function getDefaultMediaTitle() {
        return 'Вид товара';
    }

    function getBuyButton(Controller $controller) {
        return $controller->widget('bootstrap.widgets.TbButton', array(
            'url'=>array('album/index'),
            'type'=>'primary',
            'label'=> 'Загрузить файлы и распечатать',
        ), true);
    }
}