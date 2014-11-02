<?php
/**
 * Created by PhpStorm.
 * User: елена
 * Date: 02.11.2014
 * Time: 17:58
 * @var $this SiteController
 */
$this->renderPartial('//category/view',array(
    'highlight' => $query,
    'title' => sprintf('Результаты поиска по <strong>"%s"</strong>',CHtml::encode($query)),
    'categories'=>$categories,
    'goods'=>$goods,
));