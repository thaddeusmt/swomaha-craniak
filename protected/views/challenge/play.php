<?php
$this->breadcrumbs=array(
	'Games'=>array('index'),
    $model->app->name=>array('student/game','id'=>$model->app->id),
	$model->name,
);

$this->menu=array();
?>

<h1><?php echo $model->name; ?></h1>

<p><?php echo $model->description ?></p>

<?php if($assessment->type == 'quiz'): ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'quiz-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <ul>
    <?php foreach($questions as $i=>$question):?>
        <li>
            <strong><?php echo $question->prompt ?></strong><br/>
            <?php echo $form->radioButtonList($studentAnswer,'['.$i.']answer_id',CHtml::listData($question->answers, 'id', 'answer')); ?>
        </li>
    <?php endforeach; ?>
    </ul>
    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'Submit')); ?>
    </div>
    <?php $this->endWidget(); ?>

<?php else:?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'freeform-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <h4><?php echo $questions; ?></h4>
    <?php
    $this->widget('application.extensions.ckeditor.CKEditorWidget',
        array(
            "model"=>$studentAnswer,				// Data-Model
            "attribute"=>'submission',		// Attribute in the Data-Model
            //"defaultValue"=>$model->description,
            // Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
            "config" => array(
                "height"=>"200px",
                "width"=>"100%",
                "toolbar"=>"Basic",
            ),
        // Path to ckeditor.php
        "ckBasePath"=>Yii::app()->baseUrl."/ckeditor/",
      ));
    ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'Submit')); ?>
    </div>
    <?php $this->endWidget(); ?>

<?php endif; ?>



