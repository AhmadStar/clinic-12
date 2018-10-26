<div class="row">
    <?php if(!empty($diagnose[0]['id'])){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('diagnose/edit/'.$diagnose[0]['id'],array("id"=>"newDiagnosesForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('DiagnoseInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='diagnose_name_en' id="diagnose_name_en" value="<?php echo set_value('diagnose_name_en', $diagnose[0]['diagnose_name_en']);?>" class='form-control' placeholder="<?php trP('EnglishName')?>" title="<?php trP('EnglishName')?>" required autofocus /></div>
                    <div class="col-md-6"><input type="text" name='diagnose_name_ar' id='diagnose_name_ar' value="<?php echo set_value('diagnose_name_ar', $diagnose[0]['diagnose_name_ar']);?>" class='form-control' placeholder="<?php trP('ArabicName')?>" title='الاسم العربي' required /></div>
                </div>
                <div class="clearfix"></div>
        </fieldset>
        <fieldset>
            <legend>-
                <?php trP('Description')?>: </legend>
            <div>
                <div class="form-group">
                    <div class="col-md-12"><textarea name="description" id="description" class="form-control" rows="10"><?php echo set_value('description', $diagnose[0]['description']);?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('diagnose',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoDiagnose')?>">

        <?php echo anchor('diagnose', '<button class="btn btn-return"><span>'.tr('GotoDiagnose').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Diagnose Not Found</h1></div><div class="pull-right" title="Go to Diagnosess">'.anchor('diagnose', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
    $(document).ready(function() {

    });

</script>
