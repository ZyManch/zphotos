<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 13:24
 * @var $this Controller
 */
$clientScript = Yii::app()->clientScript;
$clientScript->registerScriptFile('js/ajaxupload-v1.2.js');
$clientScript->registerScript(
    'upload',
    '
    var $button = $("#upload_button"),
        $info = $("#info_box");
    $button.ajaxUpload({
        url : "'.Yii::app()->getBaseUrl(true).'/cart/upload",
        name: "images",
        multiple: true,
        onSubmit: function() {
            $info.html("Uploading ... ");
            return true;
        },
        onComplete: function(result) {
            $info.html("File uploaded with result" + result);
        }
    });',
    CClientScript::POS_READY
);
?>
<a id="upload_button">UpladFile</a>
<div id="info_box"></div>
