<?php

class Student extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'student';
	}

	public function rules()
	{
		return array(
			array('user_id, first_name, last_name', 'required'),
			array('user_id', 'length', 'max'=>10),
			array('first_name, last_name', 'length', 'max'=>45),
			array('avatar', 'length', 'max'=>255),
			array('id, user_id, first_name, last_name, avatar', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'awards' => array(self::MANY_MANY, 'Award', 'award_has_student(student_id, award_id)'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'apps' => array(self::MANY_MANY, 'App', 'student_app(student_id, app_id)'),
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
			'user_id' => Yii::t('app', 'User'),
			'first_name' => Yii::t('app', 'First Name'),
			'last_name' => Yii::t('app', 'Last Name'),
			'avatar' => Yii::t('app', 'Avatar'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('user_id',$this->user_id,true);

		$criteria->compare('first_name',$this->first_name,true);

		$criteria->compare('last_name',$this->last_name,true);

		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
