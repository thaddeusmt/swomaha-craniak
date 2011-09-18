<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('student/game', 'id'=>$data->id)); ?></h2>
    <strong>Your points: <?php echo $data->getPoints(); ?></strong>

</div>
