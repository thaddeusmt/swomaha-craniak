<?php 
$assessment = Assessment::model()->findbyPk($_GET['id']);
$_SESSION['assessment_id'] = $assessment->id;
print_r($_POST);
print_r($model->errors);
?>

<h1><?php echo $assessment->name;?></h1>
<h2> Add Freeform Question </h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assessment-freeform-form',
	'enableAjaxValidation'=>false,
)); 
echo $this->renderPartial('_freeformForm', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php
	$url = array(Yii::app()->request->getQuery('returnTo'));
	if(empty($url[0])) 
		$url = array('assessment/addFreeform/id/'.$model->id);
echo CHtml::Button(Yii::t('app', 'Cancel'), array('submit' => $url)); ?>&nbsp;
<?php echo CHtml::submitButton(Yii::t('assessment_freeform', 'Add')); ?>
</div>

<?php $this->endWidget(); ?>

</div>