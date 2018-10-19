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
                    <div class="col-md-12"><input type="number" name='amount' id='amount' value="<?php echo set_value('amount', $incentive[0]->amount);?>" class='form-control' placeholder="<?php trP('IncentiveAmount')?>" title='Incentive Amount' required /></div>
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