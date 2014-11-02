<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 16.08.14
 * Time: 15:07
 * @var $model Cart
 */
$search = $model->getCartHasGoodSearch();
$provider = $search->search();
?>
<div class="row">
    <div class="col-xs-12 tools">
        <?php echo CHtml::link(
            'Мои заказы',
            array('cart/index'),
            array('class' => 'btn btn-primary')
        );?>

    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php $this->widget('zii.widgets.grid.CGridView',array(
            'dataProvider'=>$provider,
            'itemsCssClass' => 'table table-bordered table-striped table-condensed table-hover',
            'columns'=>array(
                array(
                    'name' => 'good.title',
                    'header' => 'Товар',
                    'type' => 'raw',
                    'value' => function(CartHasGood $cartHasGood) {
                        return CHtml::link(
                            $cartHasGood->getTitle(),
                            array('good/view','id' => $cartHasGood->good_id)
                        );
                    }
                ),
                array(
                    'name' => 'count',
                    'header' => 'Количество',
                    'class' => 'ext.editable.EditableColumn',
                    'editable' => array(
                        'url'        => $this->createUrl('cart/changeField'),
                        'placement'  => 'right',
                        'inputclass' => 'span3',
                        'success'    => 'function() {location.reload();}',
                    ),
                    'htmlOptions' => array('width' => '150px')
                ),

                array(
                    'name' => 'total_price',
                    'header' => 'Стоимость',
                    'htmlOptions' => array('width' => '150px')
                ),
                array(
                    'class'=>'zii.widgets.grid.CButtonColumn',
                    'template' => '{view} {delete}',
                    'viewButtonUrl'=>'Yii::app()->controller->createUrl("good/view",array("id"=>$data->primaryKey))',
                    'viewButtonOptions'=>array('class'=>'view','target'=>'_blank'),
                    'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))',
                    'htmlOptions' => array('width' => '40px')
                ),
            ),
        )); ?>
            <?php if ($provider->totalItemCount):?>
            <div class="text-right">
                <?php echo CHtml::link(
                    'Оплатить',
                    array('payment/index'),
                    array('class' => 'btn btn-success')
                );?>
            </div>
            <?php endif;?>
    </div>
</div>