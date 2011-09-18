<p class="note"><?php echo Yii::t('assessment_question','Fields with');?> <span class="required">*</span> <?php echo Yii::t('assessment_question','are required');?>.</p>

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
			"height"=>"60px",
			"width"=>"100%",
			"toolbar"=>"Basic",
		),
		// Path to ckeditor.php
		"ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
	  ) );
	?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'points'); ?>
	<?php echo $form->textField($model,'points',array('size'=>10)); ?>
</div>
<div class="form">
<h3>Answers</h3>
<table style="width:inherit;">
	<thead>
		<tr><th></th><th>Choices</th><th>Correct Answer</th></tr>
	</thead>
<?php for($i = 1; $i <= 4; $i++) {?>
	<tr>
		<th><?php echo $i;?></th>
		<td><?php echo CHtml::activeTextField(Answer::model(),"[$i]answer",array('size'=>40)); ?></td>
		<td><?php echo CHtml::activeRadioButton(Answer::model(),"[$i]correct"); ?></td>
	</tr>
<?php }?>
</table>
<?php echo $form->error($model,'prompt'); ?>
</div>

