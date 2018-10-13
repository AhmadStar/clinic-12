<div class="row">
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('income/new_income',array("id"=>"newIncomeForm", "role"=>"form",)); ?>
      <fieldset>
        <legend>- <?php trP('IncomeInformation')?>:</legend>        
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
           
          <div class="form-group">
            <div class="col-md-12"><?php echo form_dropdown('patient_id',$patient_list,$this->input->post('patient_id'),"class='form-control' title='Patient' required");?></div>
          </div>
          <div class="form-group">
            <div class="col-md-12"><?php echo form_dropdown('doctor_id',$doctor_list,$this->input->post('doctor_id'),"class='form-control' title='Doctor' required");?></div>
          </div>    
          </div>
          <div class="form-group">            
            <div class="col-md-6"><input type="date" name='date' id='date' value="<?php echo $this->input->post('date');?>" class='form-control' placeholder='date' title='date' required /></div>
            <div class="col-md-6"><input type="number" name='amount' id='amount' value="<?php echo $this->input->post('amount');?>" class='form-control' placeholder="<?php trP('amount')?>" title='amount' required /></div>
          </div> 
          <div class="form-group">            
            <div class="col-md-6">
            <?php echo form_dropdown('type',$type_options,$this->input->post('type'),"class='form-control' title='Type'");?>
            </div>
          </div>           
          <div class="clearfix"></div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Register')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('income',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<script>
  $(document).ready(function(){

  });
</script>