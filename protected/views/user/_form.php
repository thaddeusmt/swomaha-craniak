<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>


<?php if(isset($_POST['returnUrl']))

		echo CHtml::hiddenField('returnUrl', $_POST['returnUrl']); ?>
<?php echo $form->errorSummary($model); ?>

		<div class="row">
<?php echo $form->labelEx($model,'email'); ?>
<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'email'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo CHtml::activeDropDownList($model, 'type', array(
			'teacher' => Yii::t('app', 'teacher') ,
			'student' => Yii::t('app', 'student') ,
)); ?>
<?php echo $form->error($model,'type'); ?>
</div>

		<div class="row">
<?php echo $form->labelEx($model,'password'); ?>
<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'password'); ?>
</div>

