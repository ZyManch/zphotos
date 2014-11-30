<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 17:57
 * @var Office $office
 */
Yii::import('ext.EGMap.*');

$gMap = new EGMap();
$script = Yii::app()->clientScript;
$script->registerScriptFile('http://www.google.com/jsapi', CClientScript::POS_HEAD);
$script->registerScript(
    'google_map_init',
    '
    google.load("maps","3",{"other_params":"sensor=false"});
    var markers = [];
    var map;',
    CClientScript::POS_HEAD
);
$jsCode = '
var mapOptions = {
    center:    new google.maps.LatLng(' . $office->x . ',' .$office->y .'),
    zoom:      15,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControlOptions:{
        position: google.maps.ControlPosition.LEFT_BOTTOM,
        style:    google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
};
map = new google.maps.Map(document.getElementById("map_content"), mapOptions);
var marker = new google.maps.Marker({
    map:      map,
    position: new google.maps.LatLng(' . $office->x . ',' . $office->y .')
});';
$script->registerScript(
    'google_map_show',
    $jsCode,
    CClientScript::POS_READY
);
?>
<div class="row">
    <div class="col-xs-4">
        <h2>Пункт выдачи "<?php echo $office->title;?>"</h2>
        <?php echo $office->city->name;?>
        <br>
        <?php echo $office->address;?>
        <br>
        <strong>Время работы</strong>
        <?php if ($office->lunch):?>
            <div class="text-success">Обед <?php echo $office->lunch;?></div>
        <?php endif;?>
        <?php foreach($office->getWorkDays() as $day => $config):?>
            <?php if ($config):?>
                <div class="row">
                    <div class="col-xs-4 text-right">
                    <?php echo $day;?>
                    </div>
                    <div class="col-xs-8">
                    <?php echo $config[0];?>-<?php echo $config[1];?>
                    </div>
                </div>
            <?php else:?>
                <div class="row text-danger">
                    <div class="col-xs-4 text-right">
                    <?php echo $day;?>
                    </div>
                    <div class="col-xs-8">
                     выходной
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
        <div class="text-center">
            <?php echo CHtml::link('Все офисы',array('office/index'),array('class'=>'btn btn-primary'));?>
        </div>
    </div>
    <div class="col-xs-8">
        <div id="map_content"></div>
    </div>
</div>