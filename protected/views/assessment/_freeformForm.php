<p class="note"><?php echo Yii::t('assessment_freeform','Fields with');?> <span class="required">*</span> <?php echo Yii::t('assessment_freeform','are required');?>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<?php echo $form->labelEx($model,'prompt'); ?>
	<?php
	$this->widget('application.extensions.ckeditor.CKEditorWidget',
		array(
			"model"=>$model,				// Data-Model
			"attribute"=>'prompt',		// Attribute in the Data-Model
			"defaultValue"=>$model->prompt,
		 
			// Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
			"height"=>"200px",
			"width"=>"100%",
			"toolbar"=>"Basic",
		),
		// Path to ckeditor.php
		"ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
	  ) );
	?>
	<?php echo $form->error($model,'prompt'); ?>
</div>
