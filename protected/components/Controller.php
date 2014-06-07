<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function init() {
        parent::init();
        Yii::app()->bootstrap->register();
        $user = Yii::app()->user;
        $isGuest = $user->getIsGuest();
        $this->menu = array(
            array('label'=>'Главная', 'url'=>array('/site/index')),
            array('label'=>'О нас', 'url'=>array('/site/page', 'id'=>'about')),
            array('label'=>'Фотографии', 'url'=>array('/site/page', 'id'=>'about'),'items' => array(
                array('label'=>'Цена', 'url'=>array('/site/index')),
                array('label'=>'Доставка и оплата', 'url'=>array('/site/index')),
            )),
            array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>$isGuest),
            array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$isGuest)
        );
    }
}