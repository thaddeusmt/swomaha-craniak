<div style="clear: both; padding: 10px; border: 2px solid #ccc; margin: 10px 0;">

    <div style="float: left; margin-right: 15px; padding: 2px; border: 1px solid #ccc; ">
        <?php echo CHtml::link(CHtml::image($data->image,CHtml::encode($data->name),array('style'=>'width:80px;')), array('student/game', 'id'=>$data->id)); ?>
    </div>

    <div style="float: left; width: 300px;">
        <h2><?php echo CHtml::link(CHtml::encode($data->name), array('student/game', 'id'=>$data->id)); ?></h2>
        <strong>Your score: <?php echo $data->getPoints(); ?> / 100</strong>
    </div>

    <div style="float: left">
        <h4>Badges Earned</h4>
        <img style="width: 40px" src="/images/badges/first_place.png" />
    </div>

    <br style="clear: both;" />
</div>
