<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 18:10
 * @var Image $data
 */
$marginLeft = $data->getMarginLeft(200);
$marginRight = $data->getMarginRight(200);
$marginTop = $data->getMarginTop(200);
$marginBottom = $data->getMarginBottom(200);
?>
<a href="<?php echo CHtml::normalizeUrl(array('image/update','id' => $data->id));?>" class="image-preview thumbnail">
    <div class="image">
        <div class="block block-top" style="left: <?php echo $marginLeft;?>px; right: <?php echo $marginRight;?>px; height: <?php echo $marginTop;?>px"></div>
        <div class="block block-left" style="width: <?php echo $marginLeft;?>px"></div>
        <div class="block block-bottom" style="left: <?php echo $marginLeft;?>px;right: <?php echo $marginRight;?>px;height: <?php echo $marginBottom;?>px"></div>
        <div class="block block-right" style="width: <?php echo $marginRight;?>px"></div>
        <img src="image/preview/<?php echo $data->id;?>" width="200px"/>
    </div>
    <div class="filename"><?php echo $data->filename;?></div>
</a>