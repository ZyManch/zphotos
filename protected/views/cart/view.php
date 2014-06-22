<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 17:48
 * @var Cart $model
 */
?>
<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('cart/index'),
        'label'=> 'Мои Альбомы',
    )); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('purchase/create','id' => $model->id),
        'type'=>'primary',
        'label'=> 'Распечатать',
    )); ?>

    <?php
    $this->renderPartial('//upload/form',array(
        'htmlOptions' => array(
            'class' => 'btn btn-warning',
        ),
        'uploadId' => 'upload_button',
        'errorId'  => 'info_box',
        'text' => 'Загрузить',
        'cartId' => $model->id
    ));?>
</div>
<div class="info">
    <div class="info-block">
        <?php
        $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$model->getImageProvider(),
            'itemView'=>'//image/_view',
        ));
        ?>
        <div class="clear"></div>
    </div>
</div>