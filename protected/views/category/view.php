<?php
/**
 * @var Category $model
 * @var Category[] $categories
 * @var Good[] $goods
 * @var $title
 * @var $highlight
 */
if (!isset($highlight)) {
    $highlight = '';
}
?>
<div class="col-xs-12">
<?php if ($model):?>
    <div class="breadcrumb">Перейти к <?php echo implode(' > ', $model->getParentPages());?></div>
    <h1><?php echo $model->title;?></h1>
    <div class=""><?php echo $model->description;?></div>
<?php else:?>
    <h1><?php echo $title;?></h1>
<?php endif;?>
<?php if ($categories):?>
<?php $this->widget('zii.widgets.CListView',array(
    'dataProvider'=>new CArrayDataProvider($categories),
    'viewData' => array('highlight' => $highlight),
    'itemView'=>'//category/_view',
)); ?>
<?php endif;?>
<?php if ($goods):?>
    <?php $this->widget('zii.widgets.CListView',array(
        'dataProvider'=>new CArrayDataProvider($goods),
        'viewData' => array('category' => $model,'highlight' => $highlight),
        'itemView'=>'//good/_view',
    )); ?>
<?php endif;?>

</div>
