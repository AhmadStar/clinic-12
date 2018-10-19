<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('nurse/new_incentive',array("id"=>"newNurseIncentiveForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('NewNurseIncentive')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo form_dropdown('nurse_id',$nurse_list,$this->input->post('nurse_id'),"class='form-control' title='Nurse' required");?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><input type="nimber" name='amount' id='amount' value="<?php echo $this->input->post('amount');?>" class='form-control' placeholder='<?php trP('IncentiveAmount')?>' title='Incentive Amount' required /></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Register')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('nurse',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script>
    $(document).ready(function() {

    });

</script>