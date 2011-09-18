<?php

class StudentAward extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'student_award';
	}

	public function rules()
	{
		return array(
			array('award_id, student_id, date', 'required'),
			array('award_id, student_id', 'length', 'max'=>10),
			array('id, award_id, student_id, date', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'award' => array(self::BELONGS_TO, 'Award', 'award_id'),
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
			'award_id' => Yii::t('app', 'Award'),
			'student_id' => Yii::t('app', 'Student'),
			'date' => Yii::t('app', 'Date'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('award_id',$this->award_id,true);

		$criteria->compare('student_id',$this->student_id,true);

		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
