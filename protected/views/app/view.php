<?php
$this->breadcrumbs=array(
	'Apps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' App', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' App', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' App', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' App', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' App', 'url'=>array('admin')),
);
?>

<h1>View App #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>


<br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'App', '{model}'=>'App'));?>: </h2>
<ul><?php foreach($model->apps as $foreignobj) {

				printf('<li>%s</li>', CHtml::link($foreignobj->name, array('app/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'Group', '{model}'=>'App'));?>: </h2>
<ul><?php foreach($model->groups as $foreignobj) {

				printf('<li>%s</li>', CHtml::link($foreignobj->name, array('group/view', 'id' => $foreignobj->id)));

				} ?></ul>
