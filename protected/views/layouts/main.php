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

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>$this->menu,

        ),
    ),
    'brand' => $this->renderPartial('//layouts/logo',null,true),
    'htmlOptions' => array('id' => 'logo')
)); ?>


<?php if(isset($this->breadcrumbs)):?>
    <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=>$this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
<?php endif?>

<div id="content">
    <?php echo $content; ?>
    <div id="footer-spacer"></div>
</div>

<div id="footer">
    Copyright &copy; <?php echo date('Y'); ?> by My Company.
</div>

</body>
</html>
