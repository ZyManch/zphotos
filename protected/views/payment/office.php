<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.11.2014
 * Time: 12:03
 * @var Office[] $offices
 */
?>

<div class="row">
    <div class="col-xs-12">
        <ul>
            <h2>Пункты выдачи</h2>
            Выберите пункт выдачи где вы собираетесь забрать товар
            <table class="table table-bordered">
                <colgroup>
                    <col width="15%">
                    <col width="40%">
                    <col width="15%">
                    <col width="20%">
                    <col width="10%">
                </colgroup>
                <tr>
                    <th>Пункт</th>
                    <th>Адрес</th>
                    <th>Телефон</th>
                    <th>График работы</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($offices as $office):?>
                    <tr>
                        <td><?php echo CHtml::link($office->title,array('office/view','id'=>$office->id),array('target'=>'_blank'));?></td>
                        <td><?php echo $office->address;?></td>
                        <td><?php echo $office->phone;?></td>
                        <td><?php echo implode('<br>',$office->getShortWorkDays());?></td>
                        <td><?php echo CHtml::link(
                                'Выбрать',
                                array('payment/office','id'=>$office->id),
                                array('class'=>'btn btn-warning')
                            );?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </ul>
    </div>
</div>