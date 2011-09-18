<?php
$this->breadcrumbs=array(
	'Games'=>array('/teacher/games'),
	$model['App']->name,
);

echo $this->renderPartial('_view', array(
	'model'=>$model['App'],
	'form' =>$form,
	'link' => true
)); ?>

<?php 
if(sizeof($model['Challenge']) > 0) { ?>
	<div class="challenges" style="margin:20px 0px;padding:10px;border:1px solid #555;-moz-border-radius:4px;border-radius:4px;background:#efefef url(/images/brain-icon.png) 98% 6px no-repeat;">
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
	echo '<p style="margin:14px;float:left;">No challenges found.</p>';
}?>
<div class="actions" style="margin-bottom:20px;float:right;clear:right;"><a href="/challenge/create/id/<?php echo $model['App']->id?>" style="-moz-border-radius:8px;border-radius:8px;border:1px solid #888;display:inline-block;padding:6px 6px 6px 34px;background:#eee url(/images/add.png) no-repeat 4px 50%;">Add Challenge</a></div>