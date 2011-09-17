<?php
$this->breadcrumbs = array(
	'Students',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Student', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Student', 'url'=>array('admin')),
);
?>

<h1>Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
