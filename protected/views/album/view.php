<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 17:48
 * @var Album $model
 * @var Controller $this
 */
Yii::app()->clientScript->registerCssFile('css/album.css');
Yii::app()->clientScript->registerScriptFile('js/album.js');
?>
<div class="row">
    <div class="col-xs-12 tools">
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
        <?php echo CHtml::link(
            'Сбросить отступы',
            array('album/reset','id'=>$model->id),
            array('class' => 'btn btn-warning')
        );?>

        <?php echo CHtml::link(
            'Мои Альбомы',
            array('album/index'),
            array('class' => 'btn btn-default')
        );?>

        <?php if ($model->inCurrentCart()):?>
            <?php echo CHtml::link(
                'Распечатать',
                array('cart/view'),
                array('class' => 'btn btn-primary')
            );?>
        <?php else:?>
            <?php echo CHtml::link(
                'Распечатать',
                array('cart/add','id' => $model->good_id,'resource_id' => $model->id),
                array('class' => 'btn btn-primary')
            );?>
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
</div>
<div class="row">
    <div class="col-xs-12">
        <?php
        $this->widget('zii.widgets.CListView',array(
            'dataProvider'=>$model->getImageProvider(),
            'itemView'=>'//image/_view',
        ));
        ?>
    </div>
</div>
