<?php
/**
 * @var Category $data
 */
$title = $data->title;
$description = $data->description;
if ($highlight) {
    $highlight = CHtml::encode($highlight);
    $title = preg_replace('/('.$highlight.')/iu','<strong>$1</strong>',$title);
    $description = preg_replace('/('.$highlight.')/iu','<strong>$1</strong>',$description);
}
?>
    <a  class="category" href="<?php echo CHtml::normalizeUrl(array('category/view','id'=>$data->id));?>">
        <div class="category-image">
            <img src="/images/category/<?php echo $data->image;?>" width="128px" height="128px">
        </div>
        <div class="category-info">
            <h2><?php echo $title; ?></h2>
            <div><?php echo $description;?></div>
        </div>
    </a>