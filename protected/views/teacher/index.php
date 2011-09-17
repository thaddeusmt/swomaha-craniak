<?php
$this->breadcrumbs = array(
	'Teachers',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Teacher', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Teacher', 'url'=>array('admin')),
);
?>

<h1>Teachers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
