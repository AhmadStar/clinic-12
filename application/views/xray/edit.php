<div class="row">
<?php if(!empty($xray->xray_id)){ ?>
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('xray/edit/'.$xray->xray_id,array("id"=>"newXrayForm", "role"=>"form",)); ?>
      <fieldset>
        <legend>- <?php trP('X-RayInformation');?>:</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
              <div class="col-md-6"><input type="text" name='xray_name_en' id="xray_name_en" value="<?php echo set_value('xray_name_en', $xray->xray_name_en);?>" class='form-control' placeholder="<?php trP('EnglishName')?>" title='Xray Name' required autofocus /></div>
            <div class="col-md-6"><input type="text" name='xray_name_ar' id='xray_name_ar' value="<?php echo set_value('xray_name_ar', $xray->xray_name_ar);?>" class='form-control' placeholder="<?php trP('ArabicName')?>" title='الاسم العربي' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='category' id='category' value="<?php echo set_value('category', $xray->category);?>" class='form-control' placeholder="<?php trP('category')?>" title='Category' /></div>
            <div class="col-md-6"><input type="number" name='price' id='price' value="<?php echo set_value('price', $xray->price);?>" class='form-control' placeholder="<?php trP('Price')?>" title='Price' required /></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>
      <fieldset>
        <legend>- <?php trP('Memo')?>: </legend>
        <div>
          <div class="form-group">
            <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"><?php echo set_value(tr('memo'), $xray->memo);?></textarea>
          </div>
        </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('xray',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
<?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Xray Not Found</h1></div><div class="pull-right" title="Go to Xrays">'.anchor('xray', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>