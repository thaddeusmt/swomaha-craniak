<?php

class StudentFreeform extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'student_freeform';
	}

	public function rules()
	{
		return array(
			array('submission, assessment_id, student_id', 'required'),
			array('assessment_id, student_id', 'length', 'max'=>10),
			array('id, submission, assessment_id, student_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'assessment' => array(self::BELONGS_TO, 'Assessment', 'assessment_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
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
			'submission' => Yii::t('app', 'Submission'),
			'assessment_id' => Yii::t('app', 'Assessment'),
			'student_id' => Yii::t('app', 'Student'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('submission',$this->submission,true);

		$criteria->compare('assessment_id',$this->assessment_id,true);

		$criteria->compare('student_id',$this->student_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
