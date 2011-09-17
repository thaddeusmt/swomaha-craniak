<?php

class TeacherController extends Controller
{
	public $layout='//layouts/column2';
	private $_model;

	public function filters()
	{
		return array(
			'accessControl', 
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model=new Teacher;

		foreach($_POST as $key => $value) {
			if(is_array($value))
				$_SESSION[$key] = $value;
		}

		if(isset($_SESSION['Teacher'])) 
			$model->attributes = $_SESSION['Teacher'];

		$this->performAjaxValidation($model);

		if(isset($_POST['Teacher']))
		{
			$model->attributes = $_POST['Teacher'];

			if(isset($_POST['Teacher']['App']))
				$model->apps = $_POST['Teacher']['App'];
			if(isset($_POST['Teacher']['Group']))
				$model->groups = $_POST['Teacher']['Group'];

			if($model->save()) {
				unset($_SESSION['Teacher']);

				if(isset($_POST['returnUrl']))
					$this->redirect($_POST['returnUrl']); 
				else
					$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();

		$this->performAjaxValidation($model);

		if(isset($_POST['Teacher']))
		{
			$model->attributes = $_POST['Teacher'];

			if(isset($_POST['Teacher']['App']))
				$model->apps = $_POST['Teacher']['App'];
			if(isset($_POST['Teacher']['Group']))
				$model->groups = $_POST['Teacher']['Group'];

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel()->delete();

			if(!isset($_GET['ajax']))
			{
				$returnUrl = $_POST['returnUrl'];
				$this->redirect(!empty($returnUrl) ? $returnUrl : array('admin'));
			}
		}
		else
			throw new CHttpException(400,
					Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Teacher');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Teacher('search');
		$model->unsetAttributes();

		if(isset($_GET['Teacher']))
			$model->attributes = $_GET['Teacher'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model = Teacher::model()->findbyPk($_GET['id']);

			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] == 'teacher-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
