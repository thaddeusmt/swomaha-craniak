<?php

class Criteria extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'criteria';
	}

	public function rules()
	{
		return array(
			array('task_assessment_freeform_id', 'required'),
			array('points', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>45),
			array('task_assessment_freeform_id', 'length', 'max'=>10),
			array('description', 'safe'),
			array('id, title, description, points, task_assessment_freeform_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'taskAssessmentFreeform' => array(self::BELONGS_TO, 'AssessmentFreeform', 'task_assessment_freeform_id'),
		);
	}

	public function behaviors()
	{
		return array(
			'CAdvancedArBehavior' => array(
				'class' => 'ext.CAdvancedArBehavior'
			)
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'points' => Yii::t('app', 'Points'),
			'task_assessment_freeform_id' => Yii::t('app', 'Task Assessment Freeform'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('points',$this->points);

		$criteria->compare('task_assessment_freeform_id',$this->task_assessment_freeform_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
