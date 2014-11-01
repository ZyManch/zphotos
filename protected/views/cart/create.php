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
<div class="row">
    <div class="col-xs-12 tools">
        <?php if($album_id):?>
            <?php echo CHtml::link(
                'Вернуться к альбому',
                array('album/view','id' => $album_id),
                array('class' => 'btn btn-default')
            );?>
        <?php endif;?>
        <?php echo CHtml::link(
            'Мои альбомы',
            array('album/view','id' => $album_id),
            array('class' => 'btn btn-default')
        );?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2>Печать</h2>
        <?php $this->widget('zii.widgets.CListView',array(
            'dataProvider'=>$albums,
            'itemView'=>'_cart',
        )); ?>
    </div>
</div>
