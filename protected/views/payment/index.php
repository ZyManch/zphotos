<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 19:12
 * @var Delivery[] $deliveries
 */
?>

<div class="row">
    <div class="col-xs-12">
        <ul>
            <h2>Доставка</h2>
            Выберите интересующий Вам один из доступных видов доставки
            <table class="table table-bordered">
                <colgroup>
                    <col width="15%">
                    <col width="65%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <tr>
                    <th>Доставка</th>
                    <th>Описание</th>
                    <th>Комиссия</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($deliveries as $delivery):?>
                    <tr>
                        <td><?php echo $delivery->title;?></td>
                        <td><?php echo $delivery->description;?></td>
                        <td><span class="money"><?php echo $delivery->price;?>р.</span></td>
                        <td><?php echo CHtml::link(
                            'Выбрать',
                            array('payment/delivery','id'=>$delivery->id),
                            array('class'=>'btn btn-warning')
                        );?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </ul>
    </div>
</div>