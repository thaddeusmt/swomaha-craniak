<?php
$this->breadcrumbs = array(
	'Apps'/*,
	Yii::t('app', 'Index'),*/
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' App', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' App', 'url'=>array('admin')),
);
?>

<h1 style="float:left;margin-bottom:10px;">My Apps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<div class="actions" style="margin-bottom:20px;float:right;clear:right;"><a href="/app/create" style="-moz-border-radius:8px;border-radius:8px;border:1px solid #888;display:inline-block;padding:6px 6px 6px 34px;background:#eee url(/images/add.png) no-repeat 4px 50%;">Add App</a></div>