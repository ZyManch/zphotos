<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:43
 * @var Cart $data
 */
?>
<div class="cart">
    <div class="name">
        <?php echo CHtml::link(htmlspecialchars($data->name),array('cart/view','id' => $data->id));?>
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