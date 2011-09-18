<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>

<?php echo $form->errorSummary($model); ?>

				<div class="row">
<?php echo $form->labelEx($model,'first_name'); ?>
<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'first_name'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'last_name'); ?>
<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'last_name'); ?>
</div>

