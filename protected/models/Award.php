<?php

class Award extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'award';
	}

	public function rules()
	{
		return array(
			array('id, app_id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('app_id', 'length', 'max'=>10),
			array('id, app_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'app' => array(self::BELONGS_TO, 'App', 'app_id'),
			'students' => array(self::MANY_MANY, 'Student', 'award_has_student(award_id, student_id)'),
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
			'app_id' => Yii::t('app', 'App'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('app_id',$this->app_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
