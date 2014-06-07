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
));