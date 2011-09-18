<?php
$this->breadcrumbs = array(
	'Awards',
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Award', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Award', 'url'=>array('admin')),
);
?>

<h1>Awards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
