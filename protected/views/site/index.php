<?php
/* @var $this SiteController */
/* @var $model UploadForm */
/* @var $form TbActiveForm */
?>
<?php
$this->renderPartial('//upload/form',array(
    'htmlOptions' => array(
        'class'    => 'green_circle',
    ),
    'uploadId' => 'upload_button',
    'errorId'  => 'info_box',
    'text' => 'Загрузить'
));?>
<div id="top-left-info">
    <div  class="info-block">
    Теперь <span class="title"><span>z</span>Prints</span> предлагает вам возможность распечатать свои фотографии в
    <span class="city">Набережных челнах</span>
    по удивительно низкой цене, всего по
    <span class="money"><?php echo number_format(Yii::app()->params['price'],2);?></span> рубля
    за фотографию 10x15.<br>
    </div>
</div>