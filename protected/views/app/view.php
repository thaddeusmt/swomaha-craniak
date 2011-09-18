<?php
$this->breadcrumbs=array(
	'Games'=>array('/teacher/games'),
	$model->name,
);

/*$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' App', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' App', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' App', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' App', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' App', 'url'=>array('admin')),
);*/
?>

<h1><?php echo $model->name; ?></h1>

<img src="<?php echo $model->image ?>" />

<h2>Challenges</h2>

<ul>
<?php foreach($model->challenges as $challenge): ?>
    <li><?php echo CHtml::link($challenge->name, array('/challenge/edit','id'=>$challenge->id)) ?></li>
<?php endforeach; ?>
</ul>

    <h3><?php echo CHtml::link('Create New Challenge', array('/challenge/create')); ?></h3>

