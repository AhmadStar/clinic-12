<div class="row">
<?php if(!empty($consume->id)){ ?>
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('consume/edit/'.$consume->id,array("id"=>"newConsumeForm", "role"=>"form",)); ?>
      <fieldset>
        <legend>- <?php trP('ConsumeInformation')?>:</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
              <div class="col-md-6"><input type="text" name='name' id="name" value="<?php echo set_value('name', $consume->name);?>" class='form-control' placeholder="<?php trP('ConsumeName')?>" title='Consume Name' required autofocus /></div>
            <div class="col-md-6"><?php echo form_dropdown('doctor_id',$doctor_list,
                $consume->doctor_id,"class='form-control' title='Doctor' required");?></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="number" name='count' id='count' value="<?php echo set_value('count', $consume->count);?>" class='form-control' placeholder="<?php trP('Count')?>" title='count' /></div>
            <div class="col-md-6"><input type="number" name='price' id='price' value="<?php echo set_value('price', $consume->price);?>" class='form-control' placeholder="<?php trP('Price')?>" title='price' required /></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>      
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?>         class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('consume',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
<?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Drug Not Found</h1></div><div class="pull-right" title="Go to Consumes">'.anchor('consume', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>