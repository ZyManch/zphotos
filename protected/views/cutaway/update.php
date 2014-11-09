<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 14.09.14
 * Time: 8:10
 * @var $model Cutaway
 * @var $side int
 * @var $this Controller
 * @var $form CActiveForm
 */
$client = Yii::app()->clientScript;
$client->registerCssFile('/css/cutaway.css');
$client->registerCssFile('/css/colorpicker.css');
$client->registerScriptFile('/js/cutaway.js');
$client->registerScriptFile('/js/bootstrap-colorpicker.js');
$width = 600;
?>
<div class="row">
    <div class="col-xs-12">
        <h3>Визитка #<?php echo $model->cutaway_template_id;?></h3>
    </div>
</div>
<?php $form=$this->beginWidget('CActiveForm',array(
    'id'=>'cutaway-form',
    //'type' => 'horizontal',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('class' => '')
));
?>
<div class="row">
    <div class="col-xs-4">
        <?php echo CHtml::hiddenField('zoom',$width/$model->cutawayTemplate->width);?>
        <?php echo CHtml::hiddenField('model_id',$model->id);?>
        <?php foreach ($model->cutawayTexts as $cutawayText):?>
            <?php if ($cutawayText->side == $side):?>
                <div class="cutaway-block">
                    <?php echo CHtml::hiddenField('texts['.$cutawayText->id.'][x]',$cutawayText->x,array('data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'x'));?>
                    <?php echo CHtml::hiddenField('texts['.$cutawayText->id.'][y]',$cutawayText->y,array('data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'y'));?>
                    <?php echo CHtml::hiddenField('texts['.$cutawayText->id.'][font_id]',$cutawayText->font_id,array('data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'font_id'));?>
                    <div class="block-color">
                        <?php echo CHtml::textField('texts['.$cutawayText->id.'][color]','#'.$cutawayText->color,array('maxsize' => 6,'class'=>'form-control input-sm colorpicker', 'data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'color'));?>
                    </div>
                    <div class="block-fontsize">
                        <?php echo CHtml::textField('texts['.$cutawayText->id.'][fontsize]',$cutawayText->fontsize,array('maxsize' => 3,'class'=>'form-control input-sm','data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'fontsize'));?>
                    </div>
                    <?php echo $this->renderPartial('font/_select',array('cutawayText' => $cutawayText));?>
                    <div class="block-label">
                        <?php echo CHtml::textArea('texts['.$cutawayText->id.'][label]',$cutawayText->label,array('class'=>'form-control','data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'label'));?>
                    </div>
                    <div class="block-button">
                        <?php echo CHtml::link(
                            '<span class="glyphicon glyphicon-remove"></span>',
                            array('cutaway/deleteText','id' => $cutawayText->id,'side'=>$side),
                            array('class' => 'btn btn-default input-sm')
                        );?>
                    </div>
                </div>
                <hr class="clear">
            <?php endif;?>
        <?php endforeach;?>
        <?php echo CHtml::link(
            'Добавить текст',
            array('cutaway/addText','id' => $model->id,'side'=>$side),
            array('class' => 'btn btn-small btn-default')
        );?>
        <?php echo CHtml::link(
            'Сохранить как шаблон',
            array('cutaway/saveAsTemplate','id' => $model->id,'side'=>$side),
            array('class' => 'btn btn-small btn-default')
        );?>
    </div>
    <div class="col-xs-8">
        <div class="control-group">
            Сторона
            <div class="btn-group">
                <?php foreach(array(0,1) as $sideIndex):?>
                    <?php if ($model->cutawayTemplate->haveSide($sideIndex)):?>
                        <?php echo CHtml::link(
                            $model->cutawayTemplate->sideLabel($sideIndex),
                            array('cutaway/update','id' => $model->id,'side'=>$sideIndex),
                            array('class' => 'btn btn-default btn-small'.($sideIndex == $side ? ' active':''))
                        );?>

                    <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
        <div class="thumbnail cutaway" style="width: <?php echo $width;?>">
            <img src="<?php echo CHtml::normalizeUrl(array('cutaway/preview','id' => $model->id,'side' => $side));?>" width="<?php echo $width;?>px" class="cutaway-side">
            <?php foreach($model->cutawayTexts as $cutawayText):?>
                <?php if ($cutawayText->side == $side):?>
                <img class="cutaway-text" data-cutaway-text="<?php echo $cutawayText->id;?>" data-cutaway-attr="image" src="<?php echo CHtml::normalizeUrl(array('cutaway/previewText','cutaway_width'=>$width,'id' => $cutawayText->id));?>"/>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php $this->endWidget();?>