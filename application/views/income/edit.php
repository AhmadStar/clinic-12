<div class="row">
<?php if(!empty($income[0]['id'])){ ?>
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('income/edit/'.$income[0]['id'],array("id"=>"newIncomeForm", "role"=>"form",)); ?>
      <fieldset>
       <legend>- <?php trP('IncomeInformation')?>:</legend>        
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
              <div class="col-md-6"><?php echo form_dropdown('doctor_id',$doctor_list,
                $income[0]['doctor_id'],"class='form-control' title='Doctor' required");?>
              </div>
              <div class="col-md-6"><?php echo form_dropdown('patient_id',$patient_list,
                $income[0]['patient_id'],"class='form-control' title='Doctor' required");?>
              </div>                          
          </div>
          <div class="form-group">            
            <div class="col-md-6"><?php echo form_dropdown('type',$type_options,$income[0]['type'],"class='form-control' title='Type'");?></div>
            <div class="col-md-6"><input type="number" name='amount' id='amount' value="<?php echo set_value('amount', $income[0]['amount']);?>" class='form-control' placeholder="<?php trP('amount')?>"title='amount' required /></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>      
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('income',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
<?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Income Not Found</h1></div><div class="pull-right" title="Go to Incomes">'.anchor('income', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
  $(document).ready(function(){

  });
</script>