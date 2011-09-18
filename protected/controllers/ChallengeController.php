<?php

class ChallengeController extends Controller
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
				'actions'=>array('play'),
				'users'=>array('student'),
			),
			array('allow',
				'actions'=>array('admin','delete','create','update','index','view'),
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
		$model=new Challenge;

		$this->performAjaxValidation($model);

		if(isset($_POST['Challenge']))
		{
			$model->attributes = $_POST['Challenge'];

			if($model->save()) {

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

		if(isset($_POST['Challenge']))
		{
			$model->attributes = $_POST['Challenge'];

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
		$dataProvider=new CActiveDataProvider('Challenge');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Challenge('search');
		$model->unsetAttributes();

		if(isset($_GET['Challenge']))
			$model->attributes = $_GET['Challenge'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model = Challenge::model()->findbyPk($_GET['id']);

			if($this->_model===null)
				throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] == 'challenge-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionPlay()
	{
        $this->layout = 'student';
        $model = Challenge::model()->findbyPk($_GET['id']);
        $assessment = Assessment::model()->findByAttributes(array('task_id'=>$_GET['id']));

        $questions = null;
        if($assessment->type == 'quiz') {
            $questions = AssessmentQuestion::model()->findAllByAttributes(array('assessment_id'=>$assessment->id));

            if(isset($_POST['StudentAnswer']))
            {
                $answer_id = null;
                foreach($questions as $i=>$question)
                {
                    $studentAnswer = new StudentAnswer;
                    if(isset($_POST['StudentAnswer'][$i]))
                        $answer_id=$_POST['StudentAnswer'][$i]['answer_id'];
                    $studentAnswer->answer_id = $answer_id;
                    $studentAnswer->assessment_id = $assessment->id;
                    $studentAnswer->assessment_question_id = $question->id;
                    $studentAnswer->student_id = STUDENTID;
                    $studentAnswer->save();
                    //print_r($studentAnswer->errors);
                }
                $this->redirect(array('/student/game','id'=>$model->id));
            }
            $studentAnswer = new StudentAnswer;
        } elseif($assessment->type == 'freeform') {
            $freeform = AssessmentFreeform::model()->findByAttributes(array('assessment_id'=>$assessment->id));
            $questions = $freeform->prompt;
            $studentAnswer = new StudentFreeform;
            if(isset($_POST['StudentFreeform']))
            {
                $studentAnswer->attributes = $_POST['StudentFreeform'];
                $studentAnswer->assessment_id = $assessment->id;
                $studentAnswer->student_id = STUDENTID;
                $studentAnswer->save();
                $this->redirect(array('/student/game','id'=>$model->id));
            }
            $studentAnswer = new StudentFreeform;
        }

		$this->render('play',array(
			'model'=>$model,
            'assessment'=>$assessment,
            'questions'=>$questions,
            'studentAnswer'=>$studentAnswer
		));
	}
}
