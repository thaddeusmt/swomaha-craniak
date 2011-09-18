<?php
$this->breadcrumbs = array(
	Yii::t('app', 'Games'),
);

?>

<h1>My Games</h1>

<?php echo CHtml::link('Create New Game', array('app/create')); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_gameView',
)); ?>
