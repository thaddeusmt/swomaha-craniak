<?php
$this->breadcrumbs=array(
	'Challenges'=>array('index'),
	$model['Challenge']->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Challenge', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Challenge', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' Challenge', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' Challenge', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' Challenge', 'url'=>array('admin')),
);
?>
<div style="margin:20px 0px;padding:10px;border:1px solid #555;-moz-border-radius:4px;border-radius:4px;background:#efefef;">
	<h2>Challenge</h2> 
	<?php echo $this->renderPartial('_view', array(
		'model'=>$model['Challenge'],
		'form' =>$form,
		'link' =>false
	)); 
	
	if($model['Assessment'] != null) {?>
		<h2>Assessment</h2>
	<?php echo $this->renderPartial('/assessment/_view', array(
				'data'=>$model['Assessment'],
				'form' =>$form,
				'link' => true
		));
	}
	?>
</div>