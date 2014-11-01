<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:41
 * @var IDataProvider $albums
 */
?>
<div class="row">
    <div class="col-xs-12 tools">
        <?php echo CHtml::link('Распечатать',array('cart/create'),array('class' => 'btn btn-primary'));?>
        <?php
        $this->renderPartial('//upload/form',array(
            'htmlOptions' => array(
                'class' => 'btn btn-warning',
            ),
            'uploadId' => 'upload_button',
            'errorId'  => 'info_box',
            'text' => 'Загрузить'
        ));?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h2>Мои альбомы</h2>
        <?php $this->widget('zii.widgets.CListView',array(
            'dataProvider'=>$albums,
            'itemView'=>'_view',
        )); ?>
    </div>
</div>