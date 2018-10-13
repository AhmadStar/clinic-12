<div class="row">
<?php if(!empty($doctor->id)){ ?>
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('doctor/edit/'.$doctor->id,array("id"=>"newDoctorForm", "role"=>"form",)); ?>
      <fieldset>
        <legend>- <?php trP('DoctorInformation')?>:</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
              <div class="col-md-6"><input type="text" name='name' id="name" value="<?php echo set_value('name', $doctor->name);?>" class='form-control' placeholder="<?php trP('DoctorName')?>" title='Doctor Name' required autofocus /></div>
            <div class="col-md-6"><input type="text" name='address' id='address' value="<?php echo set_value('address', $doctor->address);?>" class='form-control' placeholder="<?php trP('Address')?>" title='address' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="tel" name='phone' id='category' value="<?php echo set_value('category', $doctor->phone);?>" class='form-control' placeholder="<?php trP('category')?>" title='Category' /></div>            
          </div>
          <div class="clearfix"></div>
      </fieldset>      
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('doctor',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
<?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Doctor Not Found</h1></div><div class="pull-right" title="Go to Doctors">'.anchor('doctor', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
  $(document).ready(function(){

  });
</script>