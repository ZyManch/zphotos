<?php
/**
 * Created by PhpStorm.
 * User: елена
 * Date: 19.10.2014
 * Time: 22:00
 * @var array $menu
 * @var Controller $this
 * @var bool $sub
 */
$url = isset($menu['url']) ? CHtml::normalizeUrl($menu['url']) : '#';
$active = $url!='#' ? strpos(Yii::app()->request->requestUri, $url)===0 : false;
?>
<?php if (isset($menu['visible']) && !$menu['visible']):?>
<?php elseif(!isset($menu['items']) || !$menu['items']):?>
    <li<?php if ($active):?> class="active"<?php endif;?>>
        <?php echo CHtml::link($menu['label'],$url);?>
    </li>
<?php elseif ($sub):?>
    <li<?php if ($active):?> class="active"<?php endif;?>>
        <a href="<?php echo $url;?>">
            <b class="caret"></b>
            <?php echo CHtml::encode($menu['label']);?>

        </a>
        <ul class="dropdown-menu">
            <?php foreach ($menu['items'] as $item):?>
                <?php $this->renderPartial('//layouts/_menuItem',array('menu' => $item,'sub' => true));?>
            <?php endforeach;?>
        </ul>
    </li>
<?php else:?>
    <li class="dropdown<?php if ($active):?> active<?php endif;?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $url;?>">
            <b class="caret"></b>
            <?php echo CHtml::encode($menu['label']);?>

        </a>
        <ul class="dropdown-menu" role="menu">
            <?php foreach ($menu['items'] as $item):?>
                <?php $this->renderPartial('//layouts/_menuItem',array('menu' => $item,'sub' => true));?>
            <?php endforeach;?>
        </ul>
    </li>

<?php endif;?>