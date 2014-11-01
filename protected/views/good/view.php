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
Yii::app()->clientScript->registerCssFile('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css');
Yii::app()->clientScript->registerCssFile('//blueimp.github.io/Gallery/css/blueimp-gallery.min.css');
Yii::app()->clientScript->registerCssFile('/css/bootstrap-image-gallery.min.css');
Yii::app()->clientScript->registerScriptFile('http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js');
Yii::app()->clientScript->registerScriptFile('/js/bootstrap-image-gallery.min.js');
$medias = $model->getMedias();
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
            <img src="<?php echo $model->getAvatarMediaPath();?>">
        </div>
        <div class="description">
            <h1><?php echo $model->title;?></h1>
            <?php echo $model->description;?>
            <hr>
            Цена
            <ul>
                <?php if (sizeof($model->goodPrices)==0):?>
                    <li>Цена неизвестна</li>
                <?php elseif (sizeof($model->goodPrices) > 1):?>
                    <?php $previousCount = 0;?>
                    <?php foreach ($model->goodPrices as $price):?>
                        <?php if ($price->count):?>
                            <li>От <?php echo $previousCount+1;?> до <?php echo $price->count;?> штук <?php echo $price->getHumanPrice();?></li>
                        <?php else:?>
                            <li>От <?php echo $previousCount+1;?> штук <?php echo $price->getHumanPrice();?></li>
                        <?php endif;?>
                        <?php $previousCount=$price->count;?>
                    <?php endforeach;?>
                <?php else: ?>
                    <li><?php echo $model->goodPrices[0]->getHumanPrice();?></li>
                <?php endif;?>
            </ul>
            <?php $total = $model->getCount(Good::COUNT_TOTAL);?>
            <?php $available = $model->getCount(Good::COUNT_AVAILABLE);?>
            <?php $locked = $model->getCount(Good::COUNT_LOCKED);?>
            <?php if ($total):?>
                <hr>
                Товаров на складе
                <div class="progress">
                    <div class="bar bar-success" style="width: <?php echo round(100*$available/$total);?>%" title="Товаров доступно">

                    </div>
                    <div class="bar bar-warning" style="width: <?php echo round(100*$locked/$total);?>%" title="Товаров забронировано">

                    </div>
                </div>
            <?php endif;?>
            <hr>
            <?php echo $model->getBuyButton($this); ?>


        </div>
        <div class="clear"></div>
    </div>
</div>
<?php if ($medias):?>
    <hr>
    <div id="links">
        <?php foreach ($medias as $media):?>
                <a href="/images/good/<?php echo $media->preview_filename;?>" data-gallery>
                    <img src="/images/good/<?php echo $media->filename;?>" alt="<?php $media->title ? $media->title : $model->getDefaultMediaTitle();?>"/>
                </a>
        <?php endforeach;?>
        <div class="clear"></div>
    </div>
<?php endif;?>