<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 14.09.14
 * Time: 8:10
 * @var $model Cutaway
 * @var $side int
 * @var $this Controller
 * @var $form TbActiveForm
 */
$client = Yii::app()->clientScript;
$client->registerCssFile('/css/cutaway.css');
$client->registerScriptFile('/js/cutaway.js');
$width = 600;
?>
<div class="info">
    <div class="info-block">
        <h1>Визитка #<?php echo $model->cutaway_template_id;?></h1>
        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'cutaway-form',
            //'type' => 'horizontal',
            'enableAjaxValidation'=>false,
        ));
        ?>
        <?php echo CHtml::hiddenField('zoom',$width/$model->cutawayTemplate->width);?>
        <?php echo CHtml::hiddenField('model_id',$model->id);?>
        <div class="row">
            <div class="span4">
                <?php foreach ($model->cutawayTexts as $cutawayText):?>
                    <?php if ($cutawayText->side == $side):?>
                    <div>
                        <?php echo CHtml::textField('texts['.$cutawayText->id.'][x]',$cutawayText->x,array('data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'x'));?>
                        <?php echo CHtml::textField('texts['.$cutawayText->id.'][y]',$cutawayText->y,array('data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'y'));?>
                        <?php echo CHtml::textField('texts['.$cutawayText->id.'][color]',$cutawayText->color,array('maxsize' => 6,'class'=>'span1', 'data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'color'));?>
                        <?php echo CHtml::textField('texts['.$cutawayText->id.'][fontsize]',$cutawayText->fontsize,array('maxsize' => 3,'class'=>'span1','data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'fontsize'));?>
                        <?php echo CHtml::dropDownList('texts['.$cutawayText->id.'][font_id]',$cutawayText->font_id,Font::getVariants(),array('class'=>'span2','data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'font_id'));?>
                    </div>
                    <div>
                        <?php echo CHtml::textArea('texts['.$cutawayText->id.'][label]',$cutawayText->label,array('class'=>'span4','data-cutaway-text'=>$cutawayText->id,'data-cutaway-attr' => 'label'));?>
                    </div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
            <div class="span8">
                <div class="control-group">
                    Сторона
                    <div class="btn-group">
                        <?php foreach(array(0,1) as $sideIndex):?>
                            <?php if ($model->cutawayTemplate->haveSide($sideIndex)):?>
                                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                    'url' => array('cutaway/update','id' => $model->id,'side'=>$sideIndex),
                                    'size' => 'small',
                                    'label'=> $model->cutawayTemplate->sideLabel($sideIndex),
                                    'active' => $sideIndex == $side
                                )); ?>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="thumbnail cutaway" style="width: <?php echo $width;?>">
                    <img src="<?php echo CHtml::normalizeUrl(array('cutaway/preview','id' => $model->id,'side' => $side));?>" width="<?php echo $width;?>px">
                    <?php foreach($model->cutawayTexts as $cutawayText):?>
                        <?php if ($cutawayText->side == $side):?>
                        <img class="cutaway-text" data-cutaway-text="<?php echo $cutawayText->id;?>" data-cutaway-attr="image" src="<?php echo CHtml::normalizeUrl(array('cutaway/previewText','cutaway_width'=>$width,'id' => $cutawayText->id));?>"/>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php $this->endWidget();?>
        <div class="clear"></div>
    </div>
</div>
