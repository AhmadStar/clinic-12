<div class="row">
   <?php 
    ?>
    <?php if(!empty($schedule[0]->id)){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('nurse/editschedule/'.$schedule[0]->id,array("id"=>"newNurseForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>- <?php trP('ScheduleInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-12"><input type="date" name='work_date' id='work_date' value="<?php echo set_value('work_date', $schedule[0]->work_date);?>" class='form-control' placeholder="<?php trP('work_date')?>" title="<?php trP('work_date')?>" required /></div>
                    <div class="col-md-6"><input type="number" name='work_hours' id='work_hours' value="<?php echo set_value('work_hours', $schedule[0]->work_hours);?>" class='form-control' placeholder="<?php trP('work_hours')?>" title="<?php trP('work_hours')?>" required /></div>
                    <div class="col-md-6"><input type="number" name='hour_price' id='hour_price' value="<?php echo set_value('hour_price', $schedule[0]->hour_price);?>" class='form-control' placeholder="<?php trP('hour_price')?>" title="<?php trP('hour_price')?>" required /></div>
                </div>
                <div class="clearfix"></div>
            </div>
                
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('nurse',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoSchedules')?>">
        
        <?php echo anchor('nurse/nurseschedule/'.$schedule[0]->nurse_id, '<button class="btn btn-return"><span>'.tr('GotoSchedules').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Nurse Not Found</h1></div><div class="pull-right" title="Go to Nurses">'.anchor('nurse', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
    $(document).ready(function() {

    });

</script>
