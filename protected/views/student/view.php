<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Student', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Student', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Student', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' Student', 'url'=>array('admin')),
);
?>

<h1>View Student #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user.email',
		'first_name',
		'last_name',
	),
)); ?>


<br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'App', '{model}'=>'Student'));?>: </h2>
<ul><?php foreach($model->apps as $foreignobj) {

				printf('<li>%s</li>', CHtml::link($foreignobj->name, array('app/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'Group', '{model}'=>'Student'));?>: </h2>
<ul><?php //foreach($model->groups as $foreignobj) {

				//printf('<li>%s</li>', CHtml::link($foreignobj->name, array('group/view', 'id' => $foreignobj->id)));

				//} ?></ul>
