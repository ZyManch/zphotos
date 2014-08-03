<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:33
 * @var Album[] $albums
 * @var int $album_id
 */
?>
<div class="info tools">
    <?php if($album_id):?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'url'=>array('album/view','id' => $album_id),
            'label'=> 'Вернуться к альбому',
        )); ?>
    <?php endif;?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('album/view','id' => $album_id),
        'label'=> 'Мои альбомы',
    )); ?>
</div>
<div class="info">
    <div class="info-block">
        <h2>Печать</h2>
        <?php $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$albums,
            'itemView'=>'_album',
        )); ?>
    </div>
</div>