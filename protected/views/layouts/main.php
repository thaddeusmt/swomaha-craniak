<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<div id="all_wrapper" class="container">

    <div id="header">
        <div id="header_left"></div>
        <div id="header_right"></div>
        <div id="header_slogan">A courseware gamification company.</div>
        <div id="nav_wrapper">
            <div id="nav_bar_left"></div>
            <?php $this->widget('zii.widgets.CMenu',array(
                'id'=>'nav_bar_center',
                'firstItemCssClass'=>'first_nav_button',
                //'htmlOptions'=>array(),

                'items'=>array(
                    array('label'=>'Home', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'My Games', 'url'=>array('/student/games'),'visible'=>Yii::app()->user->name=='student','itemOptions'=>array('class'=>'nav_button')),

                    array('label'=>'My Games', 'url'=>array('/teacher/games'),'visible'=>Yii::app()->user->name=='teacher','itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'Game Builder', 'url'=>array('/app/create'),'visible'=>Yii::app()->user->name=='teacher','itemOptions'=>array('class'=>'nav_button')),

                    array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'Marketplace', 'url'=>array('/site/page', 'view'=>'marketplace'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'Contact', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'Student Login', 'url'=>array('/student/login'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'Teacher Login', 'url'=>array('/teacher/login'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'nav_button')),
                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'nav_button'))
                ),
            )); ?>
            <div id="nav_bar_right"></div>
        </div>
    </div>

    <div id="main_container">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

    </div>

    <div id="footer">&copy; 2011 Craniak</div>

</div>

</body>

</html>
