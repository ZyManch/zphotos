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
<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('cart/index'),
        'type'=>'primary',
        'label'=> 'Мои заказы',
    )); ?>
</div>

<div class="info">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$provider,
    'type'=>'striped bordered condensed hover',
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
            'htmlOptions' => array('width' => '100px')
        ),

        array(
            'name' => 'total_price',
            'header' => 'Стоимость',
            'htmlOptions' => array('width' => '120px')
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
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
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('payment/index'),
            'type'=>'success',
            'label'=>'Оплатить',
        )); ?>
    </div>
    <?php endif;?>
</div>