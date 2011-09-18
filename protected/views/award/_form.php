<p class="note"><?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.</p>


<?php if(isset($_POST['returnUrl']))

		echo CHtml::hiddenField('returnUrl', $_POST['returnUrl']); ?>
<?php echo $form->errorSummary($model); ?>

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
			<label for="Student">Belonging Student</label><?php 
						$this->widget('ext.Relation', array(
							'model' => $model,
							'relation' => 'students',
							'fields' => 'first_name',
							'allowEmpty' => false,
							'style' => 'checkbox',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose All'),
								'template' => '<div style="float:left;margin-right:5px;">{input}</div>{label}',
								),

							)
						); ?>
			