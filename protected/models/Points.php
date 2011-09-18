<?php

class Points extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'points';
	}

	public function rules()
	{
		return array(
			array('student_id, app_id, assessment_id, points, date', 'required'),
			array('points', 'numerical', 'integerOnly'=>true),
			array('student_id, app_id, assessment_id', 'length', 'max'=>10),
			array('id, student_id, app_id, assessment_id, points, date', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'app' => array(self::BELONGS_TO, 'App', 'app_id'),
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
			'student_id' => Yii::t('app', 'Student'),
			'app_id' => Yii::t('app', 'App'),
			'assessment_id' => Yii::t('app', 'Assessment'),
			'points' => Yii::t('app', 'Points'),
			'date' => Yii::t('app', 'Date'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('student_id',$this->student_id,true);

		$criteria->compare('app_id',$this->app_id,true);

		$criteria->compare('assessment_id',$this->assessment_id,true);

		$criteria->compare('points',$this->points);

		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
