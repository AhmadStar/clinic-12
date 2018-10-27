<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('nurse/new_nurse',array("id"=>"newNurseForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('NurseInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    
                    <div class="form-group">
                        <div class="col-md-6"><input type="number" name='age' id='age' value="<?php echo $this->input->post('age');?>" class='form-control' placeholder='<?php trP('Age')?>' title='Age' required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6"><input type="text" name='name' id='name' value="<?php echo $this->input->post('name');?>" class='form-control' placeholder='<?php trP('Name')?>' title='Name' required /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="phone" name='phone' id='phone' value="<?php echo $this->input->post('phone');?>" class='form-control' placeholder='<?php trP('Phone')?>' title='Phone' required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='address' id='address' value="<?php echo $this->input->post('address');?>" class='form-control' placeholder='<?php trP('Address')?>' title='Address' required /></div>
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
<script>
    $(document).ready(function() {

    });

</script>
