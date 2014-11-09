<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.11.2014
 * Time: 18:19
 * @var Office[] $offices
 */
$lastCityId = null;
?>
<div class="row">
    <div class="col-xs-12">
        <h2>Контакты</h2>
        <table class="table table-bordered">
            <colgroup>
                <col width="20%">
                <col width="10%">
                <col width="20%">
                <col width="">
            </colgroup>
            <tr>
                <th>Город</th>
                <th>Пункт выдачи</th>
                <th>Адрес</th>
                <th>Телефон</th>
            </tr>
            <?php foreach ($offices as $office):?>
                <tr>
                    <td><?php echo $office->city->name;?></td>
                    <td><?php echo CHtml::link(
                        'Пункт выдачи #'.$office->id,
                        array('office/view','id'=>$office->id)
                    );?></td>
                    <td><?php echo $office->address;?></td>
                    <td><?php echo $office->phone;?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>