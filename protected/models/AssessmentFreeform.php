<?php

class AssessmentFreeform extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'assessment_freeform';
	}

	public function rules()
	{
		return array(
			array('assessment_id, points, prompt', 'required'),
			array('points', 'numerical', 'integerOnly'=>true),
			array('assessment_id', 'length', 'max'=>10),
			array('id, assessment_id, points', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'criterias' => array(self::HAS_MANY, 'Criteria', 'assessment_freeform_id'),
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
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
