<div class="row">
   <?php 
    ?>
    <?php if(!empty($incentive[0]->id)){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('nurse/editincentive/'.$incentive[0]->id,array("id"=>"newNurseForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('IncentiveInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-6"><input type="number" name='amount' id='amount' value="<?php echo set_value('amount', $incentive[0]->amount);?>" class='form-control' placeholder="<?php trP('IncentiveAmount')?>" title="<?php trP('IncentiveAmount')?>" required /></div>
                    
                    
                    <div class="col-md-6"><input type="date" name='date' id='date' value="<?php echo set_value('date', $incentive[0]->date);?>" class='form-control' placeholder="<?php trP('date')?>" title="<?php trP('date')?>" required /></div>
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
    <div class="pull-right" title="<?php trP('GoToIncentiveNurses')?>">
        
        <?php echo anchor('nurse/nurseincentive/'.$incentive[0]->nurse_id, '<button class="btn btn-return"><span>'.tr('GoToIncentiveNurses').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Nurse Not Found</h1></div><div class="pull-right" title="Go to Nurses">'.anchor('nurse/nurseincentive/'.$incentive[0]->nurset_id, '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
    $(document).ready(function() {

    });

</script>
