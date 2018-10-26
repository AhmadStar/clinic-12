<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('consume/new_consume',array("id"=>"newConsumeForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('ConsumeInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='name' id="name" value="<?php echo $this->input->post('Consume name');?>" class='form-control' placeholder="<?php trP('ConsumeName')?>" title="<?php trP('ConsumeName')?>" required autofocus /></div>
                    <div class="col-md-6"><input type="number" name='count' id='count' value="<?php echo $this->input->post('count');?>" class='form-control' placeholder="<?php trP('Count')?>" title="<?php trP('Count')?>" required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="date" name='date' id='date' value="<?php echo $this->input->post('date');?>" class='form-control' placeholder="<?php trP('Date')?>" title="<?php trP('Date')?>" required />
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <?php echo form_dropdown('doctor_id',$doctor_list,$this->input->post('doctor_id'),"class='form-control' title=".tr('Doctor')." required");?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="number" name='price' id='price' value="<?php echo $this->input->post('price');?>" class='form-control' placeholder="<?php trP('Price')?>" title="<?php trP('Price')?>" required /></div>
                </div>
                <div class="clearfix"></div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Add')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('consume',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoTOConsumes')?>">

        <?php echo anchor('consume', '<button class="btn btn-return"><span>'.tr('GoTOConsumes').'</span></button>');?>
    </div>
</div>

