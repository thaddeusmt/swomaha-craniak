<?php
$this->breadcrumbs=array(
	'Apps'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' App', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' App', 'url'=>array('admin')),
);
?>

<h1> Create App </h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'App-form',
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
		$url = array('App/admin');
echo CHtml::Button(Yii::t('app', 'Cancel'), array('submit' => $url)); ?>&nbsp;
<?php echo CHtml::submitButton(Yii::t('app', 'Create')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
