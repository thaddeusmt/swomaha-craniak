<?php
if ($data != null) {
	$title = '<a href="/app/view/id/'.$data->id.'">'.$data->name.'</a>';
} else {	
	$data = $model;
	$title = $model->name;
	$description = $model->description;
}
?>
<div class="app" style="margin:0px 0px 10px 0px;height:44px;padding:8px;border:1px solid #555;-moz-border-radius:4px;-border-radius:4px;background-color:#efefef">
	<h1 style="margin:0px;line-height:40px;"><img src="/images/challenges/<?php echo $data->image;?>" alt="App Icon" style="margin-right:10px;float:left;height:40px;" /><?php echo $title; ?></h1>
</div>
