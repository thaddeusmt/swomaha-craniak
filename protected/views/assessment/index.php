<?php
$this->breadcrumbs = array(
	'Assessments',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Assessment', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Assessment', 'url'=>array('admin')),
);
?>

<h1>Assessments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
