<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 13:24
 * @var $this Controller
 * @var $htmlOptions array
 * @var $text array
 * @var $uploadId string
 * @var $errorId string
 */
if (!isset($htmlOptions)) {
    $htmlOptions = array();
}
if (!isset($uploadId)) {
    $uploadId = 'upload_button';
}
if (!isset($errorId)) {
    $errorId = 'info_box';
}
$htmlOptions['id'] = $uploadId;
$clientScript = Yii::app()->clientScript;
$clientScript->registerScriptFile('js/ajaxupload-v1.2.js');
$clientScript->registerScript(
    'upload_'.$uploadId.'_'.$errorId,
    '
    var $button = $("#'.$uploadId.'"),
        $info = $("#'.$errorId.'");
    $button.ajaxUpload({
        url : "'.Yii::app()->getBaseUrl(true).'/cart/upload",
        name: "images",
        multiple: true,
        onSubmit: function() {
            $button.hide();
            $info.show().html("<img src=\'images/loading.gif\' border=0>");
            return true;
        },
        onComplete: function(result) {
            $info.html(result);
        }
    });',
    CClientScript::POS_READY
);
echo CHtml::tag('div',$htmlOptions, $text);
$htmlOptions['id'] = $errorId;
if (!isset($htmlOptions['style'])) {
    $htmlOptions['style'] = '';
}
$htmlOptions['style'].= 'display:none;';
echo CHtml::tag('div',$htmlOptions,'');
