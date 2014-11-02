<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="/"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" id="black-menu">
    <div class="container-fluid">
        <div class="navbar-header brand">
            links
        </div>
        <div class="collapse navbar-collapse">
            <div class="nav navbar-nav">
                <?php foreach ($this->menu as $menu):?>
                    <?php $this->renderPartial('//layouts/_menuItem',array('menu' => $menu,'sub' => false));?>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</nav>

<?php /* if(isset($this->breadcrumbs)):?>
    <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=>$this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
<?php endif */ ?>

<div id="container">
    <div id="logo">
        <?php $this->renderPartial('//layouts/_logo');?>
    </div>
    <div id="menu">
        <div class="nav navbar-nav">
            <?php foreach ($this->userMenu as $menu):?>
                <?php $this->renderPartial('//layouts/_menuItem',array('menu' => $menu,'sub' => false));?>
            <?php endforeach;?>
        </div>
    </div>
    <div id="logo-space"></div>
    <div id="catalog">
        <div class="nav navbar-nav">
            <?php foreach ($this->catalogs as $menu):?>
                <?php $this->renderPartial('//layouts/_menuItem',array('menu' => $menu,'sub' => false));?>
            <?php endforeach;?>
        </div>
        <form class="navbar-form navbar-right" role="search" action="<?php echo CHtml::normalizeUrl(array('site/search'));?>">
            <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="Поиск" name="query">
                 <span class="input-group-btn">
                     <button type="submit" class="btn btn-default btn-sm">Найти</button>
                 </span>
            </div>

        </form>
    </div>
    <?php foreach (array('success','info','warning','danger') as $alert):?>
        <?php if (Yii::app()->user->hasFlash($alert)):?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash($alert);?>
            </div>
        <?php endif;?>
    <?php endforeach;?>
    <div id="content" class="container-fluid">
        <?php echo $content; ?>
    </div>
    <div id="footer">
        <a href="/">zPhotos</a> - печать для вашего дома и для вашего бизнеса
    </div>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ошибка</h4>
            </div>
            <div class="modal-body" id="myModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
