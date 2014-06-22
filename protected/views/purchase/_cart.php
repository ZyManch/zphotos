<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 16:21
 * @var Cart $data
 */
?>
<div class="cart">
    <div class="image-checkbox">
        <?php echo CHtml::checkBox('carts',$data->id == $cart_id,array('id' => 'cart-'.$data->id));?>
    </div>
    <div class="name">
        <?php echo CHtml::label(htmlspecialchars($data->name),'cart-'.$data->id);?>
    </div>
    <div class="image-count">
        В альбоме <?php echo sizeof($data->images);?> фотографий
    </div>
    <div class="image-status">
        <?php echo $data->getProgressText();?>
    </div>
    <div class="image-date">
        Дата изменения <?php echo $data->changed;?>
    </div>
</div>