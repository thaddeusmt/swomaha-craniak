<div class="view">

    <div style="float: right">
        BADGE 1
    </div>

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('student/game', 'id'=>$data->id)); ?></h2>
    <strong>Your points: <?php echo $data->getPoints(); ?></strong>



</div>
