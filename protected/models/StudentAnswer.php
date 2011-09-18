<?php

class StudentAnswer extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'student_answer';
	}

	public function rules()
	{
		return array(
			array('answer_id, student_id, assessment_id', 'required'),
			array('answer_id, student_id, assessment_id', 'length', 'max'=>10),
			array('id, answer_id, student_id, assessment_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'answer' => array(self::BELONGS_TO, 'Answer', 'answer_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'assessment' => array(self::BELONGS_TO, 'Assessment', 'assessment_id'),
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
			'answer_id' => Yii::t('app', 'Answer'),
			'student_id' => Yii::t('app', 'Student'),
			'assessment_id' => Yii::t('app', 'Assessment'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('answer_id',$this->answer_id,true);

		$criteria->compare('student_id',$this->student_id,true);

		$criteria->compare('assessment_id',$this->assessment_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
