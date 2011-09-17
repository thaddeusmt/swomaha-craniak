<?php
$this->breadcrumbs=array(
	'Assessments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Assessment', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Assessment', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Assessment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' Assessment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' Assessment', 'url'=>array('admin')),
);
?>

<h1>View Assessment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'task.challenge_id',
		'name',
		'type',
		'assessment_id',
	),
)); ?>


