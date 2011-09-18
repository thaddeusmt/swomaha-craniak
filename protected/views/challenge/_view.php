<?php
$data = ($model == null) ? $data : $model;
if ($link) {
	$title = '<a href="/challenge/view/id/'.$data->id.'">'.$data->name.'</a>';
	$description = '';
	$actions =	'<div class="actions" style="float:right;line-height:30px;">';
	$actions .=		'<a style="margin:0px 6px;" href="/challenge/update/id/'.$data->id.'"><img style="height:20px;vertical-align:middle;" src="/images/edit.png" alt="Edit"/></a>';
	$actions .=		'<a style="margin:0px 6px;" href="/challenge/delete/id/'.$data->id.'" onclick="return confirm(\'Are you sure you want to delete this challenge? All related questions will be permnently deleted.\');"><img style="height:20px;vertical-align:middle;" src="/images/delete.png" alt="Delete"/></a>';
	//$actions .=		'<form style="" action="/challenge/delete/id/'.$data->id.'" method="post">';
	//$actions .=			CHtml::imageButton('/images/delete.png',array('submit'=>'/challenge/delete/id/'.$data->id,'height'=>20,'onclick'=>'return confirm("Are you sure you want to delete this challenge? All related questions will be permnently deleted.");'));
	//$actions .=		'</form>';
	$actions .=	'</div>';
} else {
	$title = $model->name;
	$description = $model->description;
	$actions = '';
}
?>
<div class="challenge" style="margin:8px 0px;padding:5px;border:1px solid #666;-moz-border-radius:4px;-border-radius:4px;background-color:#fefefe;">
	<?php echo $actions;?>
	<h2 style="margin:0px;"><?php echo $title;?></h2>
	<?php echo $description;?>
</div>
