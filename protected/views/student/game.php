<?php
$this->breadcrumbs=array(
	'Games'=>array('games'),
	$model->name,
);

?>

<h1><?php echo $model->name; ?></h1>

<img src="<?php $model->image ?>" />

<h2>Challenges</h2>
<?php /*foreach($model->challenges as $challenge): ?>
    <?php echo $challenge->name ?>
<?php endforeach;*/ ?>

<h2>Badges</h2>
<?php foreach($model->awards as $award): ?>
<div>
    <img style="width: 50px" src="<?php echo $award->image ?>" alt="<?php echo $award->name ?>" /><br />
    <?php echo $award->name ?>
</div>
<?php endforeach; ?>

<h2>Leaderboard</h2>
<?php /*foreach($leaders as $leader): ?>
    <?php echo $leader->name ?>
<?php endforeach;*/ ?>
