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
	} else {
		echo '<p style="margin:14px;">No assessment was found for this challenge.</p>';
	}
	?>
</div>
<div class="actions" style="margin-bottom:20px;float:right;clear:right;"><a href="/assessment/create/id/<?php echo $model['Challenge']->id; ?>" style="-moz-border-radius:8px;border-radius:8px;border:1px solid #888;display:inline-block;padding:6px 6px 6px 34px;background:#eee url(/images/add.png) no-repeat 4px 50%;">Add Assessment</a></div>