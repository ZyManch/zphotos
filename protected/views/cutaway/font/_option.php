<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 16:06
 * @var $cutaway_text_id
 * @var $font_id
 * @var $selected
 */
?>
<div>
    <?php echo CHtml::radioButton('texts['.$cutaway_text_id.'][font_id]',$selected,array('value' => $fontId,'class' => 'font-index','data-cutaway-text'=>$cutaway_text_id));?>
    <img src="<?php echo CHtml::normalizeUrl(array('font/preview','id' => $font_id));?>"/>
</div>