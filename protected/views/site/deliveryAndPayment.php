<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 18:52
 * @var Delivery[] $deliveries
 * @var Payment[] $payments
 */
?>
<div class="col-xs-12">
    <h3>Доставка</h3>
    <img src="/images/transport.png" width="128px" height="128px" style="float: right;" border="0">
    На данный момент мы предлагаем вам один из следующих вариантов доставки:
    <ul>
        <?php foreach ($deliveries as $delivery):?>
        <li><strong><?php echo $delivery->title;?></strong><br>
                <?php echo $delivery->description;?></li>
        <?php endforeach;?>
    </ul>
    <hr>
    <h3>Оплата</h3>
    На данный момент мы предлагаем вам один из следующих вариантов оплаты:
    <ul>
        <?php foreach ($payments as $payment):?>
            <li><strong><?php echo $payment->title;?></strong><br>
                <?php echo $payment->description;?></li>
        <?php endforeach;?>
    </ul>
</div>