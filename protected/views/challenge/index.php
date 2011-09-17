<?php
$this->breadcrumbs = array(
	'Challenges',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Challenge', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Challenge', 'url'=>array('admin')),
);
?>

<h1>Challenges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
