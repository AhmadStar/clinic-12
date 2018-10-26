<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('diagnose/new_diagnose',array("id"=>"newDiagnoseForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('DiagnoseInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='diagnose_name_en' id="diagnose_name_en" value="<?php echo $this->input->post('diagnose_name_en');?>" class='form-control' placeholder="<?php trP('EnglishName')?>" title="<?php trP('EnglishName')?>" required autofocus /></div>
                    <div class="col-md-6"><input type="text" name='diagnose_name_ar' id='diagnose_name_ar' value="<?php echo $this->input->post('diagnose_name_ar');?>" class='form-control' placeholder="<?php trP('ArabicName')?>" title="<?php trP('ArabicName')?>" required /></div>
                </div>
                <div class="clearfix"></div>
        </fieldset>
        <fieldset>
            <legend>-
                <?php trP('Description')?>: </legend>
            <div>
                <div class="form-group">
                    <div class="col-md-12"><textarea name="description" id="description" class="form-control" rows="10"><?php echo $this->input->post('description');?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Register')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('diagnose',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoDiagnose')?>">

        <?php echo anchor('diagnose', '<button class="btn btn-return"><span>'.tr('GotoDiagnose').'</span></button>');?>
    </div>
</div>
<script>
    $(document).ready(function() {

    });

</script>
