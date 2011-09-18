<?php
$data = ($model == null) ? $data : $model;
if ($link) {
	$title = '<a href="/challenge/view/id/'.$data->id.'">'.$data->name.'</a>';
	$description = '';
} else {
	$title = $model->name;
	$description = $model->description;
}
?>
<div class="challenge" style="margin:8px 0px;padding:5px;border:1px solid #666;-moz-border-radius:4px;-border-radius:4px;background-color:#fefefe;">
	<h2><?php echo $title;?></h2>
	<?php echo $description;?>
</div>
