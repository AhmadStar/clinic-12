<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('drug/return_drug',array("id"=>"returnDrugForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trp('ReturnedDrugInformation')?>:</legend>
            <div id="drug_info">
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php echo form_dropdown('drug_id',$drugs_list,$this->input->post('drug_id'),"class='form-control' title=".tr('Drug')." required");?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="number" name='no_of_item' id='no_of_item' value="<?php echo $this->input->post('no_of_item');?>" class='form-control' placeholder="<?php trP('NumberOfItems')?>" title="<?php trP('NumberOfItems')?>"  required /></div>
                    <div class="col-md-6"><input type="number" name='unit_price' id='unit_price' value="<?php echo $this->input->post('unit_price');?>" class='form-control' placeholder="<?php trP('UnitPrice')?>" title="<?php trP('UnitPrice')?>" required /></div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="col-md-6"><input type="number" name='total_cost' id='total_cost' value="<?php echo $this->input->post('total_cost');?>" class='form-control' placeholder="<?php trP('TotalCost')?>" title="<?php trP('TotalCost')?>" required /></div>
                    <div class="col-md-6"><input type="date" name='return_date' id='purchase_date' value="<?php echo set_value('return_date',@$today);?>" class='form-control' placeholder="<?php trP('ReturnDate')?>" title="<?php trP('ReturnDate')?>" required /></div>
                </div>
        </fieldset>
        <fieldset>
            <legend>-
                <?php trp('Memo')?>:</legend>
            <div id="memo_fieldset">
                <div class="form-group">
                    <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10" required><?php echo $this->input->post('memo');?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Return')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('drug',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoDrugs')?>">

        <?php echo anchor('drug', '<button class="btn btn-return"><span>'.tr('GotoDrugs').'</span></button>');?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#unit_price').on('blur', function(e) {
            var uPrice = $(this).val() * 1;
            var num = $('#no_of_item').val() * 1
            var total = uPrice * num
            if ((num != null && num != 0) && (uPrice != null && uPrice != 0)) {
                $('#total_cost').val(total);
            }
        });
        $('#total_cost').on('blur', function(e) {
            var total = $(this).val() * 1;
            var num = $('#no_of_item').val() * 1
            if ((num != null && num != 0) && (total != null && total != 0)) {
                $('#unit_price').val(total / num);
            }
        });
        $('#no_of_item').on('blur', function(e) {
            var total = $('#total_cost').val() * 1;
            var uPrice = $('#unit_price').val() * 1
            var num = $('#no_of_item').val() * 1
            if ((num != null && num != 0)) {
                if ((uPrice != null && uPrice != 0) && (total != null && total != 0)) {

                } else if ((uPrice != null && uPrice != 0)) {
                    $('#total_cost').val(num * uPrice);
                } else if ((total != null && total != 0)) {
                    $('#unit_price').val(total / num);
                }
            }
        });
    });

</script>
