<?php
if ($data != null) {
	$title = '<a href="/app/view/id/'.$data->id.'">'.$data->name.'</a>';
} else {
	$data = $model;
	$title = $model->name;
}
?>
<div class="app" style="margin:14px 0px 0px 0px;height:44px;padding:8px;border:1px solid #555;-moz-border-radius:4px;border-radius:4px;background-color:#efefef">
	<img src="/images/apps/<?php echo $data->image;?>" alt="App Icon" style="padding:3px;background-color:#fff;-mox-box-shadow:2px 2px 2px #ccc;-webkit-box-shadow:2px 2px 2px #ccc;box-shadow:2px 2px 2px #ccc;margin-right:10px;float:left;height:40px;" />
	<div class="rating" style="line-height:40px;float:right;margin:10px;">
	<?php
	$stars = rand(1,5);
	for($i = 0; $i < $stars; $i++) {?>
		<img src="/images/star.png" alt="Star" />
	<?php }
	for($i = 0; $i < 5-$stars; $i++) {?>
		<img src="/images/star-empty.png" alt="Star" />
	<?php }?>
	</div>
	<h1 style="margin:0px 0px 0px 70px;line-height:40px;"><?php echo $title; ?></h1>
</div>