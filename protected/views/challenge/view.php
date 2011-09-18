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

<?php echo $this->renderPartial('_view', array(
	'model'=>$model,
	'form' =>$form
)); ?>


<h2><?php echo Yii::t('app','{relation} ',array('{relation}'=>'Assessment', '{model}'=>'Challenge'));?></h2>
<ul>
<?php
	foreach($model->assessments as $foreignobj) { 
		printf('<li>%s</li>', CHtml::link($foreignobj->name, array('assessment/view', 'id' => $foreignobj->id)));
	}
?>
</ul>