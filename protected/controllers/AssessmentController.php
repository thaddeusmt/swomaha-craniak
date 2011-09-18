<?php

class AssessmentController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('create','update','addFreeform','addMultipleChoice'),
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

	public function actionView() {
		// Get all free form questions associated with this assessment
		$models['Assessment'] = $this->loadModel();
		$models['AssessmentQuestion'] = AssessmentQuestion::model()->findAllByAttributes(array('assessment_id'=>$_GET['id']));
		$models['AssessmentFreeform'] = AssessmentFreeform::model()->findAllByAttributes(array('assessment_id'=>$_GET['id']));
		
		$this->render('view',array(
			'model'=>$models
		));
	}
	
	public function actionFreeFormView() {
		$this->render('freeFormView',array(
			'model'=>$this->loadModel()
		));
	}
	
	public function actionAddFreeform() {
		$assessment = Assessment::model()->findbyPk($_GET['id']);
		$freeform=new AssessmentFreeform;
		$freeform->attributes = $_POST['AssessmentFreeform'];
		
		if(isset($_POST['AssessmentFreeform']) && isset($_SESSION['assessment_id'])) {
			
			$criteria = $_POST['Criteria'];
			
			$freeform->assessment_id = $_SESSION['assessment_id'];

			// Save questions
			if($freeform->save()) {
				// Save all answers
				$successful = true;
				foreach($criteria as $c) {
					$criterion = new Criteria;
					$criterion->attributes = $c;
					$criterion->assessment_freeform_id = $freeform->id;
					if(!$criterion->save()) {
						$successful = false;
					}
				}
				if ($successful) {
					unset($_SESSION['assessment_id']);
			    	$this->redirect(array('view','id'=>$assessment->id));
				}
			}
		}
		
		$_SESSION['assessment_id'] = $assessment->id;

		$this->render('addFreeForm',array(
			'model'=>$freeform
		));
	}
	
	public function actionAddMultipleChoice() {
		$assessment = Assessment::model()->findbyPk($_GET['id']);
		$question=new AssessmentQuestion;
		$question->attributes = $_POST['AssessmentQuestion'];
		
		if(isset($_POST['AssessmentQuestion']) && isset($_SESSION['assessment_id'])) {
			
			$answers = $_POST['Answer'];
			
			$question->assessment_id = $_SESSION['assessment_id'];

			// Save questions
			if($question->save()) {
				// Save all answers
				$successful = true;
				foreach($answers as $a) {
					$answer = new Answer;
					$answer->attributes = $a;
					$answer->question_id = $question->id;
					if(!$answer->save()) {
						$successful = false;
					}
				}
				if ($successful) {
					unset($_SESSION['assessment_id']);
			    	$this->redirect(array('view','id'=>$assessment->id));
				}
			}
		}
		
		$_SESSION['assessment_id'] = $assessment->id;

		$this->render('addMultipleChoice',array(
			'model'=>$question
		));
	}

	public function actionCreate()
	{
		$model=new Assessment;

		foreach($_POST as $key => $value) {
			if(is_array($value))
				$_SESSION[$key] = $value;
		}

		if(isset($_SESSION['Assessment']))
			$model->attributes = $_SESSION['Assessment'];

		$this->performAjaxValidation($model);

		if(isset($_POST['Assessment']))
		{
			$model->attributes = $_POST['Assessment'];


			if($model->save()) {
				unset($_SESSION['Assessment']);

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

		if(isset($_POST['Assessment']))
		{
			$model->attributes = $_POST['Assessment'];


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
		$dataProvider=new CActiveDataProvider('Assessment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Assessment('search');
		$model->unsetAttributes();

		if(isset($_GET['Assessment']))
			$model->attributes = $_GET['Assessment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model = Assessment::model()->findbyPk($_GET['id']);

			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] == 'assessment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
