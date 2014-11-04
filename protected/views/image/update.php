<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 17.06.14
 * Time: 3:28
 * @var Image $image
 * @var CActiveForm $form
 */
Yii::app()->clientScript->registerScriptFile('/js/resizer.js');
$format = $image->album->good->printFormat;
$margin = $image->getCropEffect();
?>
<div class="row">
    <div class="col-xs-12 tools">
        <?php echo CHtml::link(
            'Сбросить отступы',
            array('album/reset','id' => $image->album_id,'image_id'=>$image->id),
            array('class' => 'btn btn-warning')
        );?>

        <?php echo CHtml::link(
            'Удалить',
            array('image/delete','id' => $image->id),
            array('class' => 'btn btn-danger')
        );?>
    </div>
</div>

<div class="row">
    <div class="col-xs-9 image-edit">
        <div class="image">
            <div class="gray-block block-top"></div>
            <div class="gray-block block-left"></div>
            <div class="gray-block block-bottom"></div>
            <div class="gray-block block-right"></div>
            <img src="<?php echo CHtml::normalizeUrl(array('image/view','id' => $image->id));?>" style="height: <?php echo round(Image::VIEW_WIDTH * $image->height / $image->width);?>px">
        </div>

    </div>
    <div class="col-xs-3 image-form">
        <?php $form=$this->beginWidget('CActiveForm',array(
            'id'=>'image-form',
            'enableAjaxValidation'=>false,
        ));
        ?>
        <?php echo $form->label($image,'name'); ?>
        <?php echo $form->textField($image,'name',array('class'=>'form-control','maxlength'=>11,'readonly'=>1)); ?>

        <div>
            <?php echo $format->title;?> (
            <?php if ($image->width > $image->height) :?>
                <b id="image-ratio" ratio="<?php echo $format->getRatio(PrintFormat::ORIENTATION_HORIZONTAL);?>"><?php echo $format->getWideSide();?>x<?php echo $format->getNarrowSide();?></b> мм
            <?php else:?>
                <b id="image-ratio" ratio="<?php echo $format->getRatio(PrintFormat::ORIENTATION_VERTICAL);?>"><?php echo $format->getNarrowSide();?>x<?php echo $format->getWideSide();?></b> мм
            <?php endif;?>)<br>
            Ширина <b id="image-width"><?php echo number_format($image->width);?>px</b><br>
            Высота <b id="image-height"><?php echo number_format($image->height);?>px</b>
        </div>

        <hr>
        <b>Отступы</b><br>
        <?php echo $form->numberField($margin,'top',array('class'=>'form-control','id' => 'image-top','readonly' => 1)); ?> <i class="icon-arrow-up"></i>
        <?php echo $form->numberField($margin,'bottom',array('class'=>'form-control','id' => 'image-bottom','readonly' => 1)); ?> <i class="icon-arrow-down"></i><br>

        <?php echo $form->numberField($margin,'right',array('class'=>'form-control','id' => 'image-right','readonly' => 1)); ?> <i class="icon-arrow-right"></i>
        <?php echo $form->numberField($margin,'left',array('class'=>'form-control','id' => 'image-left','readonly' => 1)); ?> <i class="icon-arrow-left"></i>

        <hr>

        <?php echo CHtml::link(
            'Назад',
            array('album/view','id' => $image->album_id),
            array('class' => 'btn btn-default')
        ); ?>

        <?php echo CHtml::tag(
            'input',
            array('class' => 'btn btn-primary','type'=>'submit', 'value' => 'Сохранить')

        ); ?>


        <?php $this->endWidget();?>

        <div class="clear"></div>
    </div>
</div>