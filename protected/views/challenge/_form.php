<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>

<?php echo $form->errorSummary($model); ?>


		<div class="row">
<?php echo $form->labelEx($model,'name'); ?>
<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'name'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php
$this->widget('application.extensions.ckeditor.CKEditorWidget',
	array(
		"model"=>$model,				// Data-Model
		"attribute"=>'description',		// Attribute in the Data-Model
		"defaultValue"=>$model->description,
	 
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
<?php //echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'description'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo CHtml::activeDropDownList($model, 'type', array(
			'video' => Yii::t('app', 'video') ,
			'reading' => Yii::t('app', 'reading') ,
			'link' => Yii::t('app', 'link') ,
			'lecture' => Yii::t('app', 'lecture') ,
)); ?>
<?php echo $form->error($model,'type'); ?>
</div>

<label for="App">Belonging App</label><?php
						$this->widget('ext.Relation', array(
							'model' => $model,
							'relation' => 'app',
							'fields' => 'name',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose All'),
								'template' => '<div style="float:left;margin-right:5px;">{input}</div>{label}',
								),

							)
						); ?>
