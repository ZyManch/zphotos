<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 15:43
 */
class GoodCutaway extends GoodModel {

    function getDefaultMediaTitle() {
        return 'Макет печати';
    }


    function getBuyButton(Controller $controller) {
        return $controller->widget('bootstrap.widgets.TbButton', array(
                 'url'=>array('cutaway/add','id' => $this->id),
                 'type'=>'primary',
                 'label'=> 'Заполнить поля',
                 'htmlOptions' => array(
                     'class' => 'btn btn-primary span2'
                 )
             ), true);

    }

    function createCartHasGood($scenario = null) {
        return new CartHasGoodCutaway($scenario);
    }
}