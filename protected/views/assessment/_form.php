<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>

<?php echo $form->errorSummary($model); ?>

				<div class="row">
<?php echo $form->labelEx($model,'name'); ?>
<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'name'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo CHtml::activeDropDownList($model, 'type', array(
			'quiz' => Yii::t('app', 'quiz') ,
			'freeform' => Yii::t('app', 'freeform') ,
)); ?>
<?php echo $form->error($model,'type'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'assessment_id'); ?>
<?php echo $form->textField($model,'assessment_id'); ?>
<?php echo $form->error($model,'assessment_id'); ?>
</div>

<label for="Challenge">Belonging Challenge</label><?php
						$this->widget('ext.Relation', array(
							'model' => $model,
							'relation' => 'task',
							'fields' => 'challenge_id',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose All'),
								'template' => '<div style="float:left;margin-right:5px;">{input}</div>{label}',
								),

							)
						); ?>
