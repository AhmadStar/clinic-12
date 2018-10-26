<div class="row">
    <?php if(!empty($dailyincome[0]['id'])){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('dailyincome/edit/'.$dailyincome[0]['id'],array("id"=>"newDailyIncomeForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('DailyIncomeInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php echo form_dropdown('doctor_id',$doctor_list,
                $dailyincome[0]['doctor_id'],"class='form-control' title=".tr('Doctor')." required");?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="number" name='amount' id='amount' value="<?php echo set_value('amount', $dailyincome[0]['amount']);?>" class='form-control' placeholder="<?php trP('amount')?>" title="<?php trP('amount')?>" required /></div>
                    <div class="col-md-6"><input type="date" name='date' id='date' value="<?php echo set_value('date', $dailyincome[0]['date']);?>" class='form-control' placeholder="<?php trP('Date')?>" title="<?php trP('Date')?>" required /></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('dailyincome',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoDailyIncoms')?>">

        <?php echo anchor('dailyincome', '<button class="btn btn-return"><span>'.tr('ReturnToDailyIncome').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>DailyIncome Not Found</h1></div><div class="pull-right" title="Go to DailyIncomes">'.anchor('dailyincome', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
    $(document).ready(function() {

    });

</script>
