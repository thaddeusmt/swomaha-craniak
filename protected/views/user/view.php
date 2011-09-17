<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' User', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' User', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'type',
		'password',
	),
)); ?>


<br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'Student', '{model}'=>'User'));?>: </h2>
<ul><?php foreach($model->students as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->first_name, array('student/view', 'id' => $foreignobj->id)));

				} ?></ul><br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'Teacher', '{model}'=>'User'));?>: </h2>
<ul><?php foreach($model->teachers as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->first_name, array('teacher/view', 'id' => $foreignobj->id)));

				} ?></ul>