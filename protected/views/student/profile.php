<?php
$this->breadcrumbs=array(
    'My Profile',
);

?>

<h1><?php echo $model->first_name.' '.$model->last_name; ?></h1>

<div style="width:400px; float: left; margin-right: 20px; text-align: center;">
    <img style="width:400px;" src="<?php echo $model->avatar ?>" />
    <div class="play-button" style="margin: 0 auto;">Change</div>
    <br style="clear: both;" />
</div>

<div class="float:left; width:454px;">
    <h2>Points</h2>
    <div style="overflow: hidden;">
        <div style="float: left;font-size: 60px; font-weight: bold; margin-right: 30px">
            <?php echo $model->getGlobalPoints() ?>

        </div>
        <img style="width: 60; float: left;" src="/images/coins.png" />
    </div>

    <h2>Badges</h2>
    <?php foreach($model->studentAward as $award): ?>
        <?php //echo $award->id ?>
        <img style="width:80px;" src="<?php echo $award->award->image ?>" />
    <?php endforeach; ?>

    <h2>Edit Profile</h2>

    <div class="form" style="overflow: hidden;">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'Student-form',
            'enableAjaxValidation'=>false,
        ));
        echo $this->renderPartial('_form', array(
            'model'=>$model,
            'form' =>$form
            ));
        echo $this->renderPartial('/user/_form', array(
            'model'=>$user,
            'form' =>$form
            ));?>
        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('app', 'Update')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>


    <br style="clear: both;" />
</div>
<br style="clear: both;" />
