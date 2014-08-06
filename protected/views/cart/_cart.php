<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 16:21
 * @var Album $data
 */
?>
<div class="album">
    <div class="image-checkbox">
        <?php echo CHtml::checkBox('albums',$data->id == $album_id,array('id' => 'album-'.$data->id));?>
    </div>
    <div class="name">
        <?php echo CHtml::label(htmlspecialchars($data->name),'album-'.$data->id);?>
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