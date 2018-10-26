<div class="row">
    <?php if(!empty($test->test_id)){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('test/edit/'.$test->test_id,array("id"=>"editTestForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('TestInformation')?>:</legend>
            <div id="test_info">
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='test_name_en' id="test_name_en" value="<?php echo set_value('test_name_en', $test->test_name_en);?>" class='form-control' placeholder="<?php trP('TestNameEnglish')?>" title="<?php trP('TestNameEnglish')?>" required autofocus /></div>
                    <div class="col-md-6"><input type="text" name='test_name_ar' id='test_name_ar' value="<?php echo set_value('test_name_ar', $test->test_name_ar);?>" class='form-control' placeholder="<?php trP('TestNameArabic')?>" title="<?php trP('TestNameArabic')?>" required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='category' id='category' value="<?php echo set_value('category', $test->category);?>" class='form-control' placeholder="<?php trP('category')?>" title="<?php trP('category')?>" /></div>
                    <div class="col-md-6"><input type="number" name='price' id='price' value="<?php echo set_value('price', $test->price);?>" class='form-control' placeholder="<?php trP('Price')?>" title="<?php trP('Price')?>" required /></div>
                </div>
                <div class="clearfix"></div>
        </fieldset>
        <fieldset>
            <legend>-
                <?php trP('Memo')?>:</legend>
            <div id="memo_fieldset">
                <div class="form-group">
                    <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"><?php echo set_value('memo', $test->memo);?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('test',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoToLab')?>">

        <?php echo anchor('test', '<button class="btn btn-return"><span>'.tr('ReturnToLab').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Test Not Found</h1></div><div class="pull-right" title="Go to Laboratory">'.anchor('test', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
    $(document).ready(function() {

    });

</script>
