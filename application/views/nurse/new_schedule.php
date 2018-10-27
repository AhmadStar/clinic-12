<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('nurse/new_schedule',array("id"=>"newNurseScheduleForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('AddNurseSceduleList')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="form-group">
                        <div class="col-md-6"><input type="date" name='work_date' id='work_date' value="<?php echo $this->input->post('work_date');?>" class='form-control' placeholder='<?php trP('Workdate')?>' title='<?php trP('Workdate')?>' required /></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <?php echo form_dropdown('nurse_id',$nurse_list,$this->input->post('nurse_id'),"class='form-control' title='Nurse' required");?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <div class="col-md-6"><input type="Number" name='work_hours' id='work_hours' value="<?php echo $this->input->post('work_hours');?>" class='form-control' placeholder='<?php trP('WorkHours')?>' title='<?php trP('WorkHours')?>' required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="Number" name='hour_price' id='hour_price' value="<?php echo $this->input->post('hour_price');?>" class='form-control' placeholder='<?php trP('HourPrice')?>' title='<?php trP('HourPrice')?>' required /></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Register')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('nurse',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoToNurses')?>">

        <?php echo anchor('nurse', '<button class="btn btn-return"><span>'.tr('GoToNurses').'</span></button>');?>
    </div>
</div>
