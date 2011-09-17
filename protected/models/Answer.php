<?php

class Answer extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'answer';
	}

	public function rules()
	{
		return array(
			array('question_id', 'required'),
			array('question_id', 'length', 'max'=>10),
			array('id, question_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'question' => array(self::BELONGS_TO, 'AssessmentQuestion', 'question_id'),
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
			'question_id' => Yii::t('app', 'Question'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('question_id',$this->question_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
