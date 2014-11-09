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
        $id = CHtml::ID_PREFIX.CHtml::$count++;
        return CHtml::tag(
                'div',
                array('class'=>'span1'),
                CHtml::numberField('good-count', 1, array('id' => $id,'class'=>'input-mini','min'=>1,'max' => $this->getCount(self::COUNT_AVAILABLE)))
            ).
            CHtml::tag(
                 'div',
                 array('class'=>'span3'),
                $controller->widget('bootstrap.widgets.TbButton', array(
                    'url'=>array('cart/add','id' => $this->id),
                    'type'=>'primary',
                    'buttonType' => 'button',
                    'label'=> 'Добавить в корзину',
                    'htmlOptions' => array(
                        'onclick'=>'js:location.href="'.CHtml::normalizeUrl(array('cart/add','id' => $this->id,'redirect' => Yii::app()->request->requestUri,'count'=>'')).'"+$("#'.$id.'").val()',
                        'class' => 'btn btn-primary span2'
                    )
                ), true)
            );
    }

    function createCartHasGood($scenario = null) {
        return new CartHasGoodSimple($scenario);
    }
}