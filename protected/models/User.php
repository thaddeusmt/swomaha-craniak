<?php

class User extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'user';
	}

	public function rules()
	{
		return array(
			array('email, type', 'required'),
			array('email', 'length', 'max'=>255),
			array('type', 'length', 'max'=>7),
			array('password', 'length', 'max'=>45),
			array('id, email, type, password', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'students' => array(self::HAS_MANY, 'Student', 'user_id'),
			'teachers' => array(self::HAS_MANY, 'Teacher', 'user_id'),
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
			'email' => Yii::t('app', 'Email'),
			'type' => Yii::t('app', 'Type'),
			'password' => Yii::t('app', 'Password'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('type',$this->type,true);

		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
