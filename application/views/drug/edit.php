<div class="row">
<?php if(!empty($drug->drug_id)){ ?>
  <div class="col col-md-8 well well-sm">
    <?php echo form_open('drug/edit/'.$drug->drug_id,array("id"=>"newDrugForm", "role"=>"form",)); ?>
      <fieldset>
        <legend>- <?php trP('DrugInformation')?>:</legend>
        <div>
          <?php echo ( !empty($error) ? $error : '' ); ?>
          <div class="form-group">
              <div class="col-md-6"><input type="text" name='drug_name_en' id="drug_name_en" value="<?php echo set_value('drug_name_en', $drug->drug_name_en);?>" class='form-control' placeholder="<?php trP('EnglishName')?>" title="<?php trP('EnglishName')?>" required autofocus /></div>
            <div class="col-md-6"><input type="text" name='drug_name_ar' id='drug_name_ar' value="<?php echo set_value('drug_name_ar', $drug->drug_name_ar);?>" class='form-control' placeholder="<?php trP('ArabicName')?>" title='الاسم العربي' required /></div>
          </div>
          <div class="form-group">
            <div class="col-md-6"><input type="text" name='category' id='category' value="<?php echo set_value('category', $drug->category);?>" class='form-control' placeholder="<?php trP('category')?>" title='Category' /></div>
            <div class="col-md-6"><input type="number" name='price' id='price' value="<?php echo set_value('price', $drug->price);?>" class='form-control' placeholder="<?php trP('Price')?>" title='Price' required /></div>
          </div>
          <div class="clearfix"></div>
      </fieldset>
      <fieldset>
        <legend>- <?php trP('Memo')?>: </legend>
        <div>
          <div class="form-group">
            <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"><?php echo set_value('memo', $drug->memo);?></textarea>
          </div>
        </div>
      </fieldset>
      <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6"><?php echo anchor('drug',tr('cancel'),array('class'=>'form-control btn btn-info'));?></div>
      </div>
    <?php echo form_close(); ?>
  </div>
<?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Drug Not Found</h1></div><div class="pull-right" title="Go to Drugs">'.anchor('drug', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
  $(document).ready(function(){

  });
</script>