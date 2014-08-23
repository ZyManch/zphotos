<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 12:03
 * @var $amount
 */
?>
<div class="info">
    Хотите оплатить <b><?php echo $amount;?></b> рублей
    <?php echo CHtml::link('Да',array_merge(array('robokassa/success'),$_GET),array('class' => 'btn btn-success'));?>
    <?php echo CHtml::link('Нет',array_merge(array('robokassa/fail'),$_GET),array('class' => 'btn btn-error'));?>
</div>