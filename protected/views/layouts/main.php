<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="/"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--[if lt IE 9]>
    <script src="<?php echo '/assets/js/html5shiv.js'; ?>"></script>
    <script src="<?php echo '/assets/js/respond.min.js'; ?>"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" id="logo">
    <div class="container-fluid">
        <div class="navbar-header brand">
            <?php $this->renderPartial('//layouts/_logo');?>
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

<div id="content">
    <?php foreach (array('success','info','warning','danger') as $alert):?>
        <?php if (Yii::app()->user->hasFlash($alert)):?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash($alert);?>
            </div>
        <?php endif;?>
    <?php endforeach;?>
    <?php echo $content; ?>
    <div id="footer-spacer"></div>
</div>


<div id="footer">
    Copyright &copy; <?php echo date('Y'); ?> by My Company.
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

</body>
</html>
