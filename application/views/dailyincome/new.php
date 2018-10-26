<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('dailyincome/new_dailyincome',array("id"=>"newDailyIncomeForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('DailyIncomeInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo form_dropdown('doctor_id',$doctor_list,$this->input->post('doctor_id'),"class='form-control' title=".tr('Doctor')." required");?>
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-6"><input type="date" name='date' id='date' value="<?php echo $this->input->post('date');?>" class='form-control' placeholder="<?php trP('Date')?>" title="<?php trP('Date')?>" required /></div>

                    <div class="col-md-6"><input type="number" name='amount' id='amount' value="<?php echo $this->input->post('amount');?>" class='form-control' placeholder="<?php trP('amount')?>" title="<?php trP('amount')?>" required /></div>
                </div>
                <div class="clearfix"></div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Register')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('dailyincome',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoDailyIncoms')?>">

        <?php echo anchor('dailyincome', '<button class="btn btn-return"><span>'.tr('GotoDailyIncoms').'</span></button>');?>
    </div>
</div>

