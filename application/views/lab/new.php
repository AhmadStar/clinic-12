<div class="row">
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('test/new_test',array("id"=>"newTestForm", "role"=>"form",)); ?>
      <fieldset>
        <legend>- <?php trP('TestInformation')?>:</legend>
        <div id="test_info">
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='test_name_en' id="test_name_en" value="<?php echo $this->input->post('test_name_en');?>" class='form-control' placeholder="<?php trP('TestNameEnglish')?>" title='،Test Name' required autofocus /></div>
            <div class="col-md-6"><input type="text" name='test_name_ar' id='drug_name_ar' value="<?php echo $this->input->post('test_name_ar');?>" class='form-control' placeholder="<?php trP('TestNameArabic')?>" title='الاسم العربي' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='category' id='category' value="<?php echo $this->input->post('category');?>" class='form-control' placeholder="<?php trP('category')?>" title='Category' /></div>
            <div class="col-md-6"><input type="number" name='price' id='price' value="<?php echo $this->input->post('price');?>" class='form-control' placeholder="<?php trP('Price')?>"  title='Price' required /></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>
      <fieldset>
        <legend>- <?php trP('Memo')?>:</legend>
        <div id="memo_fieldset">
          <div class="form-group">
            <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"><?php echo $this->input->post('memo');?></textarea>
          </div>
        </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Register')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('test',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>
<script>
  $(document).ready(function(){

  });
</script>