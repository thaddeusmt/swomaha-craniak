<?php
$this->breadcrumbs=array(
	'Games'=>array('/teacher/games'),
	$model->name,
);

/*$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' App', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' App', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' App', 'url'=>array('update', 'id'=>$model['App']->id)),
	array('label'=>Yii::t('app', 'Delete') . ' App', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model['App']->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' App', 'url'=>array('admin')),
);*/
?>
<div class="app" style="margin:0px 0px 10px 0px;height:44px;padding:8px;border:1px solid #555;-moz-border-radius:4px;-border-radius:4px;background-color:#efefef">
	<h1 style="margin:0px;line-height:40px;"><img src="/images/challenges/<?php echo $model['App']->image;?>" alt="App Icon" style="margin-right:10px;float:left;height:40px;" /><?php echo $model['App']->name;?></h1>
</div>

<?php 
if(sizeof($model['Challenge']) > 0) { ?>
	<div class="challenges" style="padding-left:20px">
	<h2>Challenges</h2>
	<?php foreach($model['Challenge'] as $challenge) {
		echo $this->renderPartial('/challenge/_view', array(
			'model'=>$challenge,
			'form' =>$form,
			'link' => true
		)); ?>
	<?php }?>
	</div>
<?php } else {
	echo '<p>No challenges found.</p>';
}?>
<div class="actions"><a href="">Add Challenge</a></div>
<h3><?php echo CHtml::link('Create New Challenge', array('/challenge/create')); ?></h3>
