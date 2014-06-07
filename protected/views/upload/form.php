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
    $("#UploadButton").ajaxUpload({
        url : "/cart/upload",
        name: "images",
        multiple: true,
        onSubmit: function() {
            $("#InfoBox").html("Uploading ... ");
        },
        onComplete: function(result) {
            $("#InfoBox").html("File uploaded with result" + result);
        }
    });',
    CClientScript::POS_READY
);
?>
<a class="UploadButton" id="UploadButton">UpladFile</a>
<div id="InfoBox"></div>
