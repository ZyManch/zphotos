<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 13:13
 * @var $items Cart[]
 */
?>
<div class="row">
    <div class="col-xs-12 tools">
        <?php echo CHtml::link(
            'Моя корзина',
            array('cart/view'),
            array('class' => 'btn btn-primary')
        );?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php $this->widget('zii.widgets.grid.CGridView',array(
            'id'=>'category-grid',
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
            'htmlOptions' => array('class'=>'striped bordered condensed hover'),
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
                        return CHtml::tag(
                            'div',
                            array('class' => 'progress'),
                            CHtml::tag(
                                'div',
                                array(
                                    'style'=>'width: '.$percent.'%',
                                    'class' => 'progress-bar progress-bar-'.($percent <=20 ? 'error' : ($percent>=60 ? 'success' : 'warning'))
                                ),
                                '<span class="sr-only">'.$percent.'% Complete</span>'
                            )
                        );
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
</div>