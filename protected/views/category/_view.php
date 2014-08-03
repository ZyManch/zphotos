<?php
/**
 * @var Category $data
 */
?>
    <a  class="category" href="<?php echo CHtml::normalizeUrl(array('category/view','id'=>$data->id));?>">
        <div class="category-image">
            <img src="/images/category/<?php echo $data->image;?>" width="128px" height="128px">
        </div>
        <div class="category-info">
            <h2><?php echo CHtml::encode($data->title); ?></h2>
            <div><?php echo $data->description;?></div>
        </div>
    </a>