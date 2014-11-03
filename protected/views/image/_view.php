<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.06.14
 * Time: 18:10
 * @var Image $data
 */
$height = 200;
$marginLeft = $data->getMarginLeft($height);
$marginRight = $data->getMarginRight($height);
$marginTop = $data->getMarginTop($height);
$marginBottom = $data->getMarginBottom($height);
$imageUrl = 'image/preview/'.$data->id;
$width = round($height * $data->width / $data->height);
?>
<a href="<?php echo CHtml::normalizeUrl(array('image/update','id' => $data->id));?>" class="image-preview thumbnail" style="width: <?php echo $width;?>px">
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
    <div class="filename"><?php echo $data->filename;?></div>
</a>