<?php
$this->breadcrumbs=array(
	'Challenges'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Challenge', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Challenge', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Challenge', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' Challenge', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' Challenge', 'url'=>array('admin')),
);
?>

<h1>View Challenge #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'app.name',
		'name',
		'description',
		'type',
	),
)); ?>


<br /><h2><?php echo Yii::t('app','{relation} that belongs to this {model}',array('{relation}'=>'Assessment', '{model}'=>'Challenge'));?>: </h2>
<ul>
<?php
	foreach($model->assessments as $foreignobj) { 
		printf('<li>%s</li>', CHtml::link($foreignobj->name, array('assessment/view', 'id' => $foreignobj->id)));
	}
?>
</ul>