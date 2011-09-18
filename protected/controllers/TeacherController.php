<?php

class TeacherController extends Controller
{
	public $layout='teacher';
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array(),
				'users'=>array('@'),
			),
            array('allow',
				'actions'=>array('login','game','games'),
				'users'=>array('teacher'),
			),
			array('allow',
				'actions'=>array('admin','delete','index','view','create','update'),
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
        $user=new User;

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

			    $this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
            'user'=>$user
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
				$this->redirect(array('admin'));
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

    /**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
                Yii::app()->user->type = WebUser::TYPE_TEACHER;
				$this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
}
