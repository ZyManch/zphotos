<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 17.06.14
 * Time: 3:28
 * @var Image $image
 * @var TbActiveForm $form
 */
Yii::app()->clientScript->registerScriptFile('/js/resizer.js');
$format = $image->album->good->print;
?>
<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url' => array('album/view','id' => $image->album_id),
        'type'=>'primary',
        'label'=> 'Назад',
    )); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url' => array('image/delete','id' => $image->id),
        'type'=>'danger',
        'label'=> 'Удалить',
    )); ?>
</div>

<div class="info">
    <div class="image-preview edit">
        <div class="image">
            <div class="block block-top"></div>
            <div class="block block-left"></div>
            <div class="block block-bottom"></div>
            <div class="block block-right"></div>
            <img src="<?php echo CHtml::normalizeUrl(array('image/view','id' => $image->id));?>" style="height: <?php echo round(Image::VIEW_WIDTH * $image->height / $image->width);?>px">
        </div>

    </div>
    <div class="image-form">
        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'image-form',
            //'type' => 'horizontal',
            'enableAjaxValidation'=>false,
        ));
        ?>
        <?php echo $form->textFieldRow($image,'name',array('class'=>'span3','maxlength'=>11)); ?>

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
        <?php echo $form->numberField($image,'margin_top',array('class'=>'span1','id' => 'image-top','readonly' => 1)); ?> <i class="icon-arrow-up"></i>
        <?php echo $form->numberField($image,'margin_bottom',array('class'=>'span1','id' => 'image-bottom','readonly' => 1)); ?> <i class="icon-arrow-down"></i><br>

        <?php echo $form->numberField($image,'margin_right',array('class'=>'span1','id' => 'image-right','readonly' => 1)); ?> <i class="icon-arrow-right"></i>
        <?php echo $form->numberField($image,'margin_left',array('class'=>'span1','id' => 'image-left','readonly' => 1)); ?> <i class="icon-arrow-left"></i>

        <hr>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'reset',
            'label'=>'Отмена',
        )); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Сохранить',
        )); ?>


        <?php $this->endWidget();?>

    </div>
    <div class="clear"></div>
</div>