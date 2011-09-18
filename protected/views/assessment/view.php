<?php
$this->breadcrumbs=array(
	'Assessments'=>array('index'),
	$model['Assessment']->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Assessment', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Assessment', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Assessment', 'url'=>array('update', 'id'=>$model['Assessment']->id)),
	array('label'=>Yii::t('app', 'Delete') . ' Assessment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model['Assessment']->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' Assessment', 'url'=>array('admin')),
);
?>

<h1><em><?php echo $model['Assessment']->name?></em></h1>
<?php 
if(sizeof($model['AssessmentQuestion']) > 0) { ?>
	<h2>Multiple Choice Questions</h2>
	<?php foreach($model['AssessmentQuestion'] as $question) {?>
		<div class="question" style="margin:8px 0px;padding:5px;border:1px solid black;background-color:#eee;">
			<?php echo $question->prompt;?>
		</div>
	<?php }?>
<?php }
if(sizeof($model['AssessmentFreeform']) > 0) { ?>
	<h2>Free Form Questions</h2>
	<?php foreach($model['AssessmentFreeform'] as $question) {?>
		<div class="question" style="margin:8px 0px;padding:5px;border:1px solid black;background-color:#eee;">
			<?php echo $question->prompt;?>
		</div>
	<?php }?>
<?php }?>

<div class="actions">Add <?php echo CHtml::link('Freeform', array('assessment/addFreeform/id/'.$model['Assessment']->id));?> | <?php echo CHtml::link('Multiple Choice', array('assessment/addMultipleChoice/id/'.$model['Assessment']->id));?></div>


