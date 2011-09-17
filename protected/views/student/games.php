<?php
$this->breadcrumbs = array(
	'Student',
	Yii::t('app', 'Games'),
);

?>

<h1>My Games</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_gameView',
)); ?>
