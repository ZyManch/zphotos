<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:43
 * @var Album $data
 */
?>
<div class="album">
    <div class="name">
        <?php echo CHtml::link(htmlspecialchars($data->name),array('album/view','id' => $data->id));?>
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