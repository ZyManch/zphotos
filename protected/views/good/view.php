<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 16:09
 * @var $model GoodModel
 * @var $category Category
 */
Yii::app()->clientScript->registerCssFile('/css/good.css');
Yii::app()->clientScript->registerCssFile('/tn3gallery/skins/tn3/tn3.css');
Yii::app()->clientScript->registerScriptFile('/tn3gallery/js/jquery.tn3lite.min.js');
$medias = $model->getMedias();
if ($medias) {
    Yii::app()->clientScript->registerScript('gallery','
		var tn1 = $(".gallery").tn3({
            skinDir:"/tn3gallery/skins",
            skin:"tn3a",
            responsive:"width",
            image:{
                maxZoom:1.5,
                crop:true,
                clickEvent:"dblclick",
                transitions:[
                    {type:"blinds"},
                    {type:"grid"},
                    {type:"grid",duration:460,easing:"easeInQuad",gridX:1,gridY:8,
                    // flat, diagonal, circle, random
                    sort:"random",sortReverse:false,diagonalStart:"bl",
                    // fade, scale
                    method:"scale",partDuration:360,partEasing:"easeOutSine",partDirection:"left"}
                ]
            }
		});'
    );
}
?>
<div class="info">
    <div class="info-block">
        <?php if ($category):?>
            <div class="breadcrumb">
                Перейти к <?php echo implode(' > ', $category->getParentPages());?> >
                <?php echo CHtml::link($model->title,array('good/view','id' => $model->id,'category_id' => $category->id));?>
            </div>
        <?php endif;?>
        <div class="avatar">
            <img src="/images/good/<?php echo $model->goodMedia->preview_filename;?>">
        </div>
        <div class="description">
            <h1><?php echo $model->title;?></h1>
            <?php echo $model->description;?>
            <ul>
                <?php $previousCount = 0;?>
                <?php foreach ($model->goodPrices as $price):?>
                    <?php if ($price->count):?>
                        <li>От <?php echo $previousCount+1;?> до <?php echo $price->count;?> штук <?php echo $price->getHumanPrice();?></li>
                    <?php else:?>
                        <li>От <?php echo $previousCount+1;?> штук <?php echo $price->getHumanPrice();?></li>
                    <?php endif;?>
                    <?php $previousCount=$price->count;?>
                <?php endforeach;?>
            </ul>
            <?php echo $model->getBuyButton($this); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="info">
    <?php if ($medias):?>
        <div class="gallery">
            <div class="tn3 album">
                <h4>Fixed Dimensions</h4>
                <div class="tn3 description">Images with fixed dimensions</div>
                <div class="tn3 thumb">images/35x35/1.jpg</div>
                <ol>
                    <?php foreach ($medias as $media):?>
                        <li>

                            <h4>
                                <?php if ($media->title):?>
                                    <?php echo $media->title;?>
                                <?php else:?>
                                    <?php echo $model->getDefaultMediaTitle();?>
                                <?php endif;?>
                            </h4>

                            <a href="/images/good/<?php echo $media->filename;?>">
                                <img src="/images/good/<?php echo $media->preview_filename;?>" />
                            </a>
                        </li>
                    <?php endforeach;?>
                </ol>
            </div>
        </div>
    <?php endif;?>
    <div class="clear"></div>
</div>