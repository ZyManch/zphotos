<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	public $menu=array();
	public $catalogs=array();
	public $userMenu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function init() {
        parent::init();
        Yii::setPathOfAlias('photos', dirname(__FILE__).'/../../photos');
        $client = Yii::app()->clientScript;
        $client->registerCssFile('/css/bootstrap.css');
        $client->registerCoreScript('jquery', CClientScript::POS_END);
        $client->registerCoreScript('jquery.ui', CClientScript::POS_END);
        $client->registerScriptFile('/js/bootstrap.min.js', CClientScript::POS_END);
        $client->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
        $user = Yii::app()->user;
        //var_dump($user->id);die();
        $isGuest = $user->getIsGuest();
        $isRegistered = $user->getIsRegistered();
        $userInfo = $user->getUser();
        $albums = array();
        $cutaways = array();
        if ($userInfo) {
            foreach ($userInfo->albums as $album) {
                $albums[] = array(
                    'label' => $album->name,
                    'url' => array('album/view','id' => $album->id)
                );
            }
            foreach ($userInfo->cutaways as $cutaway) {
                $cutaways[] = array(
                    'label' => $cutaway->good->title,
                    'url' => array('cutaway/update','id' => $cutaway->id)
                );
            }
        }
        $carts = Cart::getCarts();
        $this->catalogs = $this->_getCatalogMenu();
        $this->userMenu = array(
            array('label'=>'Выход ('.$userInfo->username.')', 'url'=>array('site/logout'), 'visible'=>$isRegistered),
            array('label'=>'Войти', 'url'=>array('site/login'), 'visible'=>!$isRegistered),
            array('label'=>'Регистрация', 'url'=>array('site/register'), 'visible'=>!$isRegistered),
            array('label' => 'Моя корзина','url'=>array('cart/view'),'visible' => (bool)Cart::getCurrent()),
            array('label' => 'Статус заказов','url'=>array('cart/index'),'visible' => sizeof($carts) > 0),
            array('label' => 'Альбомы','visible' => $albums,'items'=>$albums),
            array('label' => 'Визитки','visible' => $cutaways,'items'=>$cutaways),
            array('label'=>'Очистить историю', 'url'=>array('site/logout'), 'visible'=>!$isGuest && !$isRegistered),
        );
        $this->menu = array(
            array('label'=>'Главная', 'url'=>array('site/index')),
            array('label'=>'О нас', 'url'=>array('site/page', 'id'=>'about')),
            array('label'=>'Доставка и оплата', 'url'=>array('site/index')),
        );
    }

    protected function _getCatalogMenu() {
        //return array();
        $catalogs = Category::model()->findAll(array(
            'condition' => 'parent_id is null',
            'order'     => 'title asc'
        ));
        $result = array(
            array('label' => 'Каталог','url' => array('category/view'))
        );
        /** @var Category[] $catalogs */
        foreach ($catalogs as $catalog) {
            $menuItem = array(
                'label'=>$catalog->title,
                'url'=>array('category/view','id' =>$catalog->id),
                //'items' => array()
            );
            foreach ($catalog->categories as $category) {
                $menuItem['items'][] = array('label'=>$category->title, 'url'=>array('category/view','id' =>$category->id));
            }
            $result[] = $menuItem;
        }
        return $result;
    }
}