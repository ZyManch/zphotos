<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 13.09.14
 * Time: 8:43
 * @var $model GoodCutaway
 */
?>
<div class="info">
    <div class="info-block">
        <h1>Визитки</h1>
        <?php $this->widget('zii.widgets.CListView',array(
            'dataProvider'=>$model->search(),
            'itemView'=>'//good/_view',
        )); ?>
        <div class="clear"></div>
    </div>
</div>
