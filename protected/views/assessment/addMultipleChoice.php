<?php 
$assessment = Assessment::model()->findbyPk($_GET['id']);
?>

<h1><?php echo $assessment->name;?></h1>
<h2> Add Multiple Choice Question </h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assessment-question-form',
	'enableAjaxValidation'=>false,
)); 
echo $this->renderPartial('_multipleChoiceForm', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php
	$url = array(Yii::app()->request->getQuery('returnTo'));
	if(empty($url[0])) 
		$url = array('assessment/addMultipleChoice/id/'.$model->id);
echo CHtml::Button(Yii::t('app', 'Cancel'), array('submit' => $url)); ?>&nbsp;
<?php echo CHtml::submitButton(Yii::t('assessment_question', 'Add')); ?>
</div>

<?php $this->endWidget(); ?>

</div>