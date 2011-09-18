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
<div style="margin:20px 0px;padding:10px;border:1px solid #555;-moz-border-radius:4px;border-radius:4px;background:#efefef">
<h1><em><?php echo $model['Assessment']->name?></em></h1>
<?php 
if(sizeof($model['AssessmentQuestion']) > 0) { ?>
	
	<h2>Multiple Choice Questions</h2>
	<?php foreach($model['AssessmentQuestion'] as $question) {
		$actions =	'<div class="actions" style="float:right;line-height:30px;">';
		$actions .=		'<a style="margin:0px 6px;" href="/assessment/updateMultipleChoice/id/'.$question->id.'"><img style="height:20px;vertical-align:middle;" src="/images/edit.png" alt="Edit"/></a>';
		$actions .=		'<a style="margin:0px 6px;" href="/assessment/deleteMultipleChoice/id/'.$question->id.'" onclick="return confirm(\'Are you sure you want to permanently delete this question?\');"><img style="height:20px;vertical-align:middle;" src="/images/delete.png" alt="Delete"/></a>';
		$actions .=	'</div>';
	?>
	<div class="question" style="min-height:30px;-moz-border-radius:4px;border-radius:4px;margin:8px 0px;padding:5px;border:1px solid black;background-color:#fefefe;">
		<?php echo $actions; ?>
		<a href=""><?php echo $question->prompt;?></a>
	</div>
	<?php }?>
<?php }
if(sizeof($model['AssessmentFreeform']) > 0) { ?>
	<h2>Free Form Questions</h2>
	<?php foreach($model['AssessmentFreeform'] as $question) {
		$actions =	'<div class="actions" style="float:right;line-height:30px;">';
		$actions .=		'<a style="margin:0px 6px;" href="/assessment/updateMultipleChoice/id/'.$question->id.'"><img style="height:20px;vertical-align:middle;" src="/images/edit.png" alt="Edit"/></a>';
		$actions .=		'<a style="margin:0px 6px;" href="/assessment/deleteMultipleChoice/id/'.$question->id.'" onclick="return confirm(\'Are you sure you want to permanently delete this question?\');"><img style="height:20px;vertical-align:middle;" src="/images/delete.png" alt="Delete"/></a>';
		$actions .=	'</div>';
	?>
		<div class="question" style="-moz-border-radius:4px;border-radius:4px;margin:8px 0px;padding:5px;border:1px solid black;background-color:#fefefe;">
			<?php echo $actions; ?>
			<?php echo $question->prompt;?>
		</div>
	<?php }?>
<?php }?>
</div>
<div class="actions">Add <?php echo CHtml::link('Freeform', array('assessment/addFreeform/id/'.$model['Assessment']->id));?> | <?php echo CHtml::link('Multiple Choice', array('assessment/addMultipleChoice/id/'.$model['Assessment']->id));?></div>


