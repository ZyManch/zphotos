<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 17:48
 * @var Album $model
 * @var Controller $this
 */
?>
<div class="info tools">
    Всего <?php echo sizeof($model->images);?> изображений.
    Формат печати
    <?php $this->widget('editable.EditableField', array(
        'type'      => 'select',
        'model'     => $model,
        'attribute' => 'good_id',
        'source'    => Editable::source(GoodPrint::getVariants()),
        'url'       => $this->createUrl('album/changeField'),
        'placement' => 'right',
        'success'    => 'function() {location.reload();}',
    ));
    ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('album/reset','id'=>$model->id),
        'type'=>'warning',
        'label'=> 'Сбросить отступы',
    )); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('album/index'),
        'label'=> 'Мои Альбомы',
    )); ?>

    <?php if ($model->inCurrentCart()):?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'url'=>array('cart/view'),
            'type'=>'primary',
            'label'=> 'Распечатать',
        )); ?>
    <?php elseif(!$model->inAnyCart()):?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'url'=>array('cart/add','id' => $model->good_id,'resource_id' => $model->id),
            'type'=>'primary',
            'label'=> 'Распечатать',
        )); ?>
    <?php endif;?>

    <?php
    $this->renderPartial('//upload/form',array(
        'htmlOptions' => array(
            'class' => 'btn btn-warning',
        ),
        'uploadId' => 'upload_button',
        'errorId'  => 'info_box',
        'text' => 'Загрузить',
        'albumId' => $model->id
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