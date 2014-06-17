<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 17.06.14
 * Time: 3:28
 * @var Image $image
 */
$marginLeft = $image->getMarginLeft(Image::VIEW_WIDTH);
$marginRight = $image->getMarginRight(Image::VIEW_WIDTH);
$marginTop = $image->getMarginTop(Image::VIEW_WIDTH);
$marginBottom = $image->getMarginBottom(Image::VIEW_WIDTH);
?>
<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url' => array('cart/view','id' => $image->cart_id),
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
            <div class="block block-top" style="left: <?php echo $marginLeft;?>px; right: <?php echo $marginRight;?>px; height: <?php echo $marginTop;?>px"></div>
            <div class="block block-left" style="width: <?php echo $marginLeft;?>px"></div>
            <div class="block block-bottom" style="left: <?php echo $marginLeft;?>px;right: <?php echo $marginRight;?>px;height: <?php echo $marginBottom;?>px"></div>
            <div class="block block-right" style="width: <?php echo $marginRight;?>px"></div>
            <img src="<?php echo CHtml::normalizeUrl(array('image/view','id' => $image->id));?>">
        </div>
    </div>
</div>