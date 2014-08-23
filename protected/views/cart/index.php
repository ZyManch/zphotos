<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 13:13
 * @var $items Cart[]
 */
?>
<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('cart/view'),
        'type'=>'primary',
        'label'=> 'Моя корзина',
    )); ?>
</div>

<div class="info">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'category-grid',
    'type'=>'striped bordered condensed hover',
    'rowCssClassExpression' => function ($row, Cart $cart) {
        switch ($cart->progress) {
            case Cart::POSTAGE:
                return 'warning';
            case Cart::FINISHED:
                return 'success';
            default:
                return '';
        }
    },
    'dataProvider'=>new CArrayDataProvider($items),
    'columns'=>array(
        array(
            'name' => 'id',
            'htmlOptions' => array('style' => 'width: 50px')
        ),
        array(
            'name' => 'title',
            'header' => 'Название',
        ),
        array(
            'header' => 'Цена',
            'value' => function (Cart $cart) {
                return $cart->getTotalPrice().'руб';
            },
            'htmlOptions' => array('style' => 'width: 150px')
        ),
        array(
            'name' => 'progress',
            'header' => 'Статус',
            'value' => function(Cart $model) {
                return $model->getProgressText();
            },
            'htmlOptions' => array('style' => 'width: 150px')
        ),
        array(
            'name' => 'progress',
            'header' => 'Прогресс',
            'type' => 'raw',
            'value' => function(Cart $model) {
                $percent = $model->getProgressPercent();
                return Yii::app()->controller->widget('bootstrap.widgets.TbProgress',array(
                    'type' => $percent <=20 ? 'error' : ($percent>=60 ? 'success' : 'warning'),
                    'percent' => $percent,
                    'htmlOptions' => array('style' => 'margin-bottom: 0px')
                ), true);
            },
            'htmlOptions' => array('style' => 'width: 150px')
        )
    ),
)); ?>
</div>