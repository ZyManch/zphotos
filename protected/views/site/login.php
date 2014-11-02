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
        <h3 class="text-center">Войти</h3>


        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            //'enableClientValidation'=>true,
            'htmlOptions' => array('class' => 'form-horizontal'),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <div class="form-group<?php if($model->hasErrors('email')):?> has-error<?php endif;?>">
                <?php echo $form->label($model,'email',array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'email',array('class'=>'')); ?>
                </div>
            </div>
            <div class="form-group<?php if($model->hasErrors('password')):?> has-error<?php endif;?>">
                <?php echo $form->label($model,'password',array('class'=>'col-sm-3 control-label'));?>
                <div class="col-sm-9">
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control',)); ?>
                    <?php echo $form->error($model,'password',array()); ?>
                </div>
            </div>
            <div class="form-group<?php if($model->hasErrors('rememberMe')):?> has-error<?php endif;?>">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            <?php echo $form->checkBox($model,'rememberMe'); ?> Запомнить меня
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
