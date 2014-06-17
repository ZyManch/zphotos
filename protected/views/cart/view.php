<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 17:48
 * @var Cart $model
 */
?>
<div class="info tools">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=> 'Распечатать',
        'disabled' => true
    )); ?>

    <?php
    $this->renderPartial('//upload/form',array(
        'htmlOptions' => array(
            'class' => 'btn btn-warning',
        ),
        'uploadId' => 'upload_button',
        'errorId'  => 'info_box',
        'text' => 'Загрузить',
        'cartId' => $model->id
    ));?>
</div>
<div class="info">
    <div class="info-block">
        <?php
        $this->widget('bootstrap.widgets.TbListView',array(
            'dataProvider'=>$model->getImageProvider(),
            'itemView'=>'//image/_view',
        ));
        ?>
        <div class="clear"></div>
    </div>
</div>