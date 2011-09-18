<?php
$this->breadcrumbs=array(
	'Challenges'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Challenge', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' Challenge', 'url'=>array('admin')),
);
?>

<div class="form" style="margin:20px 0px;padding:10px;border:1px solid #888;-moz-border-radius:4px;border-radius:4px;background:#f5f5f5;">
	<h1 style="margin:0px 0px 8px 0px;">New Challenge</h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'challenge-form',
		'enableAjaxValidation'=>true,
	)); 
	echo $this->renderPartial('_form', array(
		'model'=>$model,
		'form' =>$form
		)); ?>
	
	<div class="row buttons">
		<?php
		$url = array(Yii::app()->request->getQuery('returnTo'));
		if(empty($url[0])) 
			$url = array('challenge/admin');
	echo CHtml::Button(Yii::t('app', 'Cancel'), array('submit' => $url)); ?>&nbsp;
	<?php echo CHtml::submitButton(Yii::t('app', 'Create')); ?>
	</div>
	
	<?php $this->endWidget(); ?>

</div>
