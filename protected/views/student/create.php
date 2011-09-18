<?php
$this->breadcrumbs=array(
	'Students'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Student', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' Student', 'url'=>array('admin')),
);
?>

<h1> Create Student </h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Student-form',
	'enableAjaxValidation'=>false,
));
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	));
echo $this->renderPartial('/user/_form', array(
	'model'=>$user,
	'form' =>$form
	));?>
<div class="row buttons">
	<?php
	$url = array(Yii::app()->request->getQuery('returnTo'));
	if(empty($url[0]))
		$url = array('Student/admin');
echo CHtml::Button(Yii::t('app', 'Cancel'), array('submit' => $url)); ?>&nbsp;
<?php echo CHtml::submitButton(Yii::t('app', 'Create')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
