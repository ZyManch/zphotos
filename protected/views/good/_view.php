<?php
/**
 * @var Good $data
 * @var Category $category
 */
if (!isset($category)) {
    $category = null;
}
?>
    <a  class="good" href="<?php echo CHtml::normalizeUrl(array('good/view','id'=>$data->id,'category_id' => $category ? $category->id : null));?>">
        <div class="good-image">
            <img src="<?php echo $data->getAvatarMediaPath();?>">
        </div>
        <div class="good-info">
            <h2><?php echo CHtml::encode($data->title); ?></h2>

            <div><?php echo $data->description;?></div>
            <div>
                <ul>
                    <?php $previousCount = 0;?>
                <?php foreach ($data->goodPrices as $price):?>
                    <?php if ($price->count):?>
                        <li>От <?php echo $previousCount+1;?> до <?php echo $price->count;?> штук <?php echo $price->getHumanPrice();?></li>
                    <?php else:?>
                        <li>От <?php echo $previousCount+1;?> штук <?php echo $price->getHumanPrice();?></li>
                    <?php endif;?>
                    <?php $previousCount=$price->count;?>
                <?php endforeach;?>
                </ul>

            </div>
        </div>

    </a>