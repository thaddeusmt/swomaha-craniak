<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>

<?php echo $form->errorSummary($model); ?>

<div style="float:left;margin-right:40px;">
	<h2 style="margin-bottom:0px;">Name <span class="required">*</span></h2>
	<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
</div>
<div style="float:left;">
	<h2 style="margin-bottom:0px;">Type <span class="required">*</span></h2>
	<?php echo CHtml::activeDropDownList($model, 'type', array(
				'video' => Yii::t('app', 'video') ,
				'reading' => Yii::t('app', 'reading') ,
				'link' => Yii::t('app', 'link') ,
				'lecture' => Yii::t('app', 'lecture') ,
	)); ?>
	<?php echo $form->error($model,'type'); ?>
</div>

<div style="clear:left;">
	<h2 style="margin-bottom:0px;">Description <span class="required">*</span></h2>
	<?php
	$this->widget('application.extensions.ckeditor.CKEditorWidget',
		array(
			"model"=>$model,				// Data-Model
			"attribute"=>'description',		// Attribute in the Data-Model
			"defaultValue"=>$model->description,
		 
			// Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
			"height"=>"100px",
			"width"=>"98%",
			"toolbar"=>"Basic",
		),
		// Path to ckeditor.php
		"ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
	  ) );
	?>
<?php echo $form->error($model,'description'); ?>
</div>