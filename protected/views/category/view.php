<?php
/**
 * @var Category $model
 * @var Category[] $categories
 * @var Good[] $goods
 */
?>
<div class="col-xs-12">
<?php if ($model):?>
    <div class="breadcrumb">Перейти к <?php echo implode(' > ', $model->getParentPages());?></div>
    <h1><?php echo $model->title;?></h1>
    <div class=""><?php echo $model->description;?></div>
<?php else:?>
    <h1>Виды товаров и услуг</h1>
<?php endif;?>
<?php if ($categories):?>
<?php $this->widget('zii.widgets.CListView',array(
    'dataProvider'=>new CArrayDataProvider($categories),
    'itemView'=>'_view',
)); ?>
<?php endif;?>
<?php if ($goods):?>
    <?php $this->widget('zii.widgets.CListView',array(
        'dataProvider'=>new CArrayDataProvider($goods),
        'viewData' => array('category' => $model),
        'itemView'=>'//good/_view',
    )); ?>
<?php endif;?>

</div>
