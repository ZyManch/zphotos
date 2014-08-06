<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 17:48
 * @var Album $model
 */
?>
<div class="info tools">
    Всего <?php echo sizeof($model->images);?> изображений.
    Формат печати
    <?php echo CHtml::activeDropDownList($model,'good_id',GoodPrint::getVariants(),array('onchange' => 'js:alert(this.value);'));?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('album/index'),
        'label'=> 'Мои Альбомы',
    )); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('cart/create','id' => $model->good_id,'resource_id' => $model->id),
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