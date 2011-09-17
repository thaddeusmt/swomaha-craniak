<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>


<?php if(isset($_POST['returnUrl']))

		echo CHtml::hiddenField('returnUrl', $_POST['returnUrl']); ?>
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

<label for="User">Belonging User</label><?php 
						$this->widget('ext.Relation', array(
							'model' => $model,
							'relation' => 'user',
							'fields' => 'email',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose All'),
								'template' => '<div style="float:left;margin-right:5px;">{input}</div>{label}',
								),

							)
						); ?>
			<label for="App">Belonging App</label><?php 
						$this->widget('ext.Relation', array(
							'model' => $model,
							'relation' => 'apps',
							'fields' => 'name',
							'allowEmpty' => false,
							'style' => 'checkbox',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose All'),
								'template' => '<div style="float:left;margin-right:5px;">{input}</div>{label}',
								),

							)
						); ?>
			<label for="Group">Belonging Group</label><?php 
						$this->widget('ext.Relation', array(
							'model' => $model,
							'relation' => 'groups',
							'fields' => 'name',
							'allowEmpty' => false,
							'style' => 'checkbox',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose All'),
								'template' => '<div style="float:left;margin-right:5px;">{input}</div>{label}',
								),

							)
						); ?>
			