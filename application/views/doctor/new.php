<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('doctor/new_doctor',array("id"=>"newDoctorForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('DoctorInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    
                    <div class="col-md-6"><input type="text" name='address' id='address' value="<?php echo $this->input->post('address');?>" class='form-control' placeholder="<?php trP('Address')?>" title="<?php trP('Address')?>" required /></div>
                    
                    <div class="col-md-6"><input type="text" name='name' id='name' value="<?php echo $this->input->post('name');?>" class='form-control' placeholder="<?php trP('DoctorName')?>" title="<?php trP('DoctorName')?>" required /></div>
                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6"><input type="date" name='created_date' id='created_date' value="<?php echo $this->input->post('created_date');?>" class='form-control' placeholder="<?php trP('created_date')?>" title="<?php trP('created_date')?>" required /></div>
                <div class="col-md-6"><input type="tel" name='phone' id='phone' value="<?php echo $this->input->post('phone');?>" class='form-control' placeholder="<?php trP('Phone')?>" title="<?php trP('Phone')?>" required /></div>
            </div>
            <div class="clearfix"></div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Add')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('doctor',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoToDoctors')?>">

        <?php echo anchor('doctor', '<button class="btn btn-return"><span>'.tr('GoToDoctors').'</span></button>');?>
    </div>
</div>

