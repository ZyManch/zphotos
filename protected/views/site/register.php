<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="col-xs-12">
    <div class="center-dialog">
        <h3 class="text-center">Регистрация</h3>


        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'htmlOptions' => array('class' => 'form-horizontal'),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <div class="form-group">
                <?php echo $form->label($model,'username',array('class'=>'col-sm-5 control-label')); ?>
                <div class="col-sm-7">
                    <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->label($model,'password',array('class'=>'col-sm-5 control-label'));?>
                <div class="col-sm-7">
                    <?php echo $form->passwordField($model,'password',array(
                        'class'=>'form-control',
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->label($model,'password_repeat',array('class'=>'col-sm-5 control-label'));?>
                <div class="col-sm-7">
                    <?php echo $form->passwordField($model,'password_repeat',array(
                        'class'=>'form-control',
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                    <div class="checkbox">
                        <label>
                            <?php echo $form->checkBox($model,'accept'); ?> Согласен с условиями
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-actions text-center">
                <?php echo CHtml::tag(
                    'input',
                    array('class' => 'btn btn-primary','type'=>'submit','value'=>'Войти')
                ); ?>
            </div>

        <?php $this->endWidget(); ?>
    </div>
</div>
