<?php

class StudentApp extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'student_app';
	}

	public function rules()
	{
		return array(
			array('student_id, app_id', 'required'),
			array('student_id, app_id', 'length', 'max'=>10),
			array('points', 'length', 'max'=>45),
			array('student_id, app_id, points', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
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
			'student_id' => Yii::t('app', 'Student'),
			'app_id' => Yii::t('app', 'App'),
			'points' => Yii::t('app', 'Points'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('student_id',$this->student_id,true);

		$criteria->compare('app_id',$this->app_id,true);

		$criteria->compare('points',$this->points,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
