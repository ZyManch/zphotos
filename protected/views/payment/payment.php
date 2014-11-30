<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.11.2014
 * Time: 12:19
 * @var Payment[] $payments
 */
?>

<div class="row">
    <div class="col-xs-12">
        <ul>
            <h2>Способ оплаты</h2>

            <table class="table table-bordered">
                <colgroup>
                    <col width="20%">
                    <col width="70%">
                    <col width="10%">
                </colgroup>
                <tr>
                    <th>Способ</th>
                    <th>Описание</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($payments as $payment):?>
                    <tr>
                        <td><?php echo $payment->title;?></td>
                        <td><?php echo $payment->description;?></td>
                        <td><?php echo CHtml::link(
                                'Выбрать',
                                array('payment/payment','id'=>$payment->id),
                                array('class'=>'btn btn-warning')
                            );?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </ul>
    </div>
</div>