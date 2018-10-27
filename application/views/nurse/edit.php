<div class="row">
    <?php if(!empty($nurse[0]['id'])){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('nurse/edit/'.$nurse[0]['id'],array("id"=>"newNurseForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('NurseInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    
                    <div class="col-md-6"><input type="number" name='age' id='age' value="<?php echo set_value('age', $nurse[0]['age']);?>" class='form-control' placeholder="<?php trP('age')?>" title="<?php trP('age')?>" required /></div>
                    
                    <div class="col-md-6"><input type="text" name='name' id='name' value="<?php echo set_value('name', $nurse[0]['name']);?>" class='form-control' placeholder="<?php trP('name')?>" title="<?php trP('name')?>" required /></div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='phone' id='phone' value="<?php echo set_value('phone', $nurse[0]['phone']);?>" class='form-control' placeholder="<?php trP('phone')?>" title="<?php trP('phone')?>" required /></div>
                    <div class="col-md-6"><input type="text" name='address' id='adress' value="<?php echo set_value('address', $nurse[0]['address']);?>" class='form-control' placeholder="<?php trP('address')?>" title="<?php trP('address')?>" required /></div>
                </div>
                <div class="clearfix"></div>

        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('nurse',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoToNurses')?>">
        
        <?php echo anchor('nurse', '<button class="btn btn-return"><span>'.tr('ReturnToNurses').'</span></button>');?>
    </div>
    <?php
    
}else{
  echo '<div class="alert alert-danger text-center"><h1>Nurse Not Found</h1></div><div class="pull-right" title="Go to Nurses">'.anchor('nurse', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>
    $(document).ready(function() {

    });

</script>
