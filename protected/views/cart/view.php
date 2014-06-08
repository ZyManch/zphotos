<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 17:48
 * @var Cart $model
 */
?>
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