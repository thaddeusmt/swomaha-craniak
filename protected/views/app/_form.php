<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<h3 style="margin:0px;"><?php echo $form->labelEx($model,'name'); ?></h3>
    <?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'name'); ?>
</div>
