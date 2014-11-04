<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 18:10
 * @var Image $data
 */
$height = 200;
$margin = $data->getCropEffect();
$marginLeft = $margin->getMarginLeft($height);
$marginRight = $margin->getMarginRight($height);
$marginTop = $margin->getMarginTop($height);
$marginBottom = $margin->getMarginBottom($height);
$imageUrl = 'image/preview/'.$data->id;
$width = round($height * $data->width / $data->height);
$effectClasses = array(
    'default',
    'primary',
    'warning'
)
?>
<div class="image-preview" style="width: <?php echo $width;?>px" data-url="<?php echo CHtml::encode($imageUrl);?>">
    <a href="<?php echo CHtml::normalizeUrl(array('image/update','id' => $data->id));?>">
        <div class="slice s1" style="background-image: url(<?php echo $imageUrl;?>)">
            <span class="overlay"></span>
            <div class="slice s2" style="background-image: url(<?php echo $imageUrl;?>)">
                <span class="overlay"></span>
                <div class="slice s3" style="background-image: url(<?php echo $imageUrl;?>)">
                    <span class="overlay"></span>
                    <div class="slice s4" style="background-image: url(<?php echo $imageUrl;?>)">
                        <span class="overlay"></span>
                        <div class="slice s5" style="background-image: url(<?php echo $imageUrl;?>)">
                            <span class="overlay"></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <div class="filename">
        <?php foreach (Effect::getAvailableEffects() as $effect):?>
            <?php if ($effect->can_delete != Effect::NO):?>
                <?php
                $active = $data->hasEffect($effect->id);
                $class = $effectClasses[$effect->group % sizeof($effectClasses)];
                ?>
                <?php echo CHtml::link(
                    CHtml::tag('span',array('class'=>'glyphicon glyphicon-music')),
                    array('image/effect','id'=>$data->id,'effect_id' => $effect->id),
                    array(
                        'data-remove-url' => CHtml::normalizeUrl(array('image/removeEffect','id'=>$data->id,'effect_id' => $effect->id)),
                        'class'=>'btn btn-default btn-xs'.($active?' active':'').(' btn-'.$class),
                        'title' => $effect->title,
                        'data-group' => $effect->group,
                        'data-content' => $effect->description,
                        'data-toggle'=>'popover'
                    )
                );?>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>