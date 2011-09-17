<?php

class Challenge extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'challenge';
	}

	public function rules()
	{
		return array(
			array('app_id, challenge_id, name', 'required'),
			array('app_id, challenge_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
			array('type', 'length', 'max'=>7),
			array('description', 'safe'),
			array('id, app_id, challenge_id, name, description, type', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'assessments' => array(self::HAS_MANY, 'Assessment', 'task_id'),
			'app' => array(self::BELONGS_TO, 'App', 'app_id'),
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
			'challenge_id' => Yii::t('app', 'Challenge'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
			'type' => Yii::t('app', 'Type'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('app_id',$this->app_id,true);

		$criteria->compare('challenge_id',$this->challenge_id,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
