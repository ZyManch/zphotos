<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 16:06
 * @var CutawayText $cutawayText
 * @var Controller $this
 */
?>
<div class="block-font">
    <div class="fonts">
        <?php $this->renderPartial('font/_option',array('font_id'=>$cutawayText->font_id, 'cutaway_text_id'=>$cutawayText->id,'selected' => true));?>
        <?php foreach (Font::getVariants() as $fontId => $title):?>
            <?php if($fontId != $cutawayText->font_id):?>
                <?php $this->renderPartial('font/_option',array('font_id'=>$fontId, 'cutaway_text_id'=>$cutawayText->id,'selected' => false));?>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>