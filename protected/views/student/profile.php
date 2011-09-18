<?php
$this->breadcrumbs=array(
	'My Profile',
);

?>

<h1><?php echo $model->first_name.' '.$model->last_name; ?></h1>

<?php echo CHtml::image($model->avatar) ?>

<h2>Badges</h2>
