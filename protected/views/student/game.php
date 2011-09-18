<?php
$this->breadcrumbs=array(
	'Games'=>array('games'),
	$model->name,
);

$leaders = array(
    Student::model()->findByPk(1),
    Student::model()->findByPk(2),
    Student::model()->findByPk(3),
    );

?>

<h1 style="font-size: 34px; font-weight: bold"><?php echo $model->name; ?></h1>

<div style="width:400px; float: left; margin-right: 20px;">
    <img style="width:400px;" src="<?php echo $model->image ?>" />
    <?php echo $model->description ?>

    <h2 style="font-size: 24px; font-weight: bold; border-bottom: 2px solid #ccc;">Leaderboard</h2>
    <?php foreach($leaders as $i=>$leader): ?>
    <div style="">
        <div style="width: 50px; float: left; font-size: 24px; font-weight: bold; text-align: center"><?php echo ($i+1) ?></div>
        <?php echo CHtml::image($leader->avatar,$leader->first_name,array('style'=>'width: 50px; float: left;')); ?>
        <div style="float: right; font-size: 20px; font-weight: bold; text-align: center">
            <div style="line-height:50px; ">
                <?php echo $model->getPoints($leader->id) ?> Points
                <img src="/images/coins.png" style="width: 20px;" />
            </div>
        </div>
        <div style="float: left; font-size: 24px; font-weight: bold; text-align: center; line-height:50px; ">
            <?php echo CHtml::link($leader->first_name, array('student/profile','id'=>$leader->id)) ?>
        </div>

        <br style="clear: both;" />
    </div>
    <?php endforeach; ?>

    <br style="clear; both;" />
</div>

<div class="float:left; width:454px;">

    <?php if( $awardNew = Yii::app()->user->getFlash('award')):?>
    <div class="flash-award" style="background: #FCDAB5; border: #FE8600 solid 2px; padding: 20px; overflow: hidden">
        <img style="width: 80px; display: block; float: left; margin-right: 20px;" src="<?php echo $awardNew->image ?>" alt="<?php echo $awardNew->name ?>" />
        <h2 style="font-size: 24px;">You earned the <?php echo $awardNew->name ?> badge!</h2>
    </div>
    <?php endif; ?>

    <h2>Challenges</h2>
    <ul style="list-style-type: none; overflow: hidden;">
        <?php foreach($model->challenges as $challenge): ?>
        <li style="margin: 0 0 10px 0;padding: 0 0 10px 0; border-bottom: 2px solid #ccc;">
            <?php echo CHtml::link("Play >", array('/challenge/play','id'=>$challenge->id),
                                   array('class'=>'play-button')) ?>
            <h3 style="margin-bottom: 0;"><?php echo CHtml::link($challenge->name, array('challenge/play','id'=>$challenge->id)) ?></h3>
            Your Points: <?php echo $challenge->getPoints() ?>
        </li>
        <?php endforeach; ?>
    </ul>

    <h2 style="font-size: 24px; font-weight: bold; border-bottom: 2px solid #ccc; overflow: hidden;">Badges</h2>
    <?php foreach($model->awards as $award): ?>
    <div style="width: 100px; float: left; text-align: center;">
        <img style="width: 50px; display: block; margin: 0 auto;" src="<?php echo $award->image ?>" alt="<?php echo $award->name ?>" />
        <?php echo $award->name ?>
    </div>
    <?php endforeach; ?>


<br style="clear: both;" />
</div>
    <br style="clear: both;" />
