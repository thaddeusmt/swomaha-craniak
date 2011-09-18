<?php
$this->breadcrumbs=array(
	'Awards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Award', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Award', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Award', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' Award', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' Award', 'url'=>array('admin')),
);
?>

<h1>View Award #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'app.name',
	),
)); ?>


<br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'Student', '{model}'=>'Award'));?>: </h2>
<ul><?php foreach($model->students as $foreignobj) { 

				printf('<li>%s</li>', CHtml::link($foreignobj->first_name, array('student/view', 'id' => $foreignobj->id)));

				} ?></ul>