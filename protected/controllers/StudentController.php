<?php

class StudentController extends Controller
{
	public $layout='main';
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
				'actions'=>array('login','game','games','profile'),
				'users'=>array('student'),
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

    public function init()
	{
		//$this->layout = 'student';
	}

	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model=new Student;
		$user=new User;

		//$this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes = $_POST['Student'];
			$user->attributes = $_POST['User'];
			$user->type = 'student';

			/*if(isset($_POST['Student']['Group']))
				$model->groups = $_POST['Student']['Group'];*/

			if($user->save()) {
				$model->user_id = $user->id;
				if($model->save()) {
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,'user'=>$user
		));
	}

	public function actionUpdate()
	{
		$model=$this->loadModel();

		$this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes = $_POST['Student'];

			if(isset($_POST['Student']['App']))
				$model->apps = $_POST['Student']['App'];
			if(isset($_POST['Student']['Group']))
				$model->groups = $_POST['Student']['Group'];

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
		$dataProvider=new CActiveDataProvider('Student');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();

		if(isset($_GET['Student']))
			$model->attributes = $_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model = Student::model()->findbyPk($_GET['id']);

			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] == 'Student-form')
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
				$this->redirect('/student/games');
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    public function actionGames()
	{
        $this->menu = array();
		$dataProvider=new CActiveDataProvider('App');
		$this->render('games',array(
			'dataProvider'=>$dataProvider,
		));
	}

    public function actionGame()
	{
        $model = App::model()->findbyPk($_GET['id']);
		$this->render('game',array(
			'model'=>$model,
		));
	}

    public function actionProfile()
	{
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = STUDENTID;
        }

        $model=Student::model()->findbyPk($id);
		$user=$model->user;

		//$this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes = $_POST['Student'];
			$user->attributes = $_POST['User'];
			$user->type = 'student';

			/*if(isset($_POST['Student']['Group']))
				$model->groups = $_POST['Student']['Group'];*/

			if($user->save()) {
				$model->user_id = $user->id;
				if($model->save()) {
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('profile',array(
			'model'=>$model,'user'=>$user
		));

	}
}
