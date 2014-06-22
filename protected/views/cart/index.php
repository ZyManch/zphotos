<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 22.06.14
 * Time: 11:41
 * @var IDataProvider $carts
 */
?>

<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'url'=>array('purchase/create'),
        'type'=>'primary',
        'label'=> 'Распечатать',
    )); ?>

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

<div class="info">
    <div class="info-block">
        <h2>Мои альбомы</h2>
        <?php $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$carts,
            'itemView'=>'_view',
        )); ?>
    </div>
</div>