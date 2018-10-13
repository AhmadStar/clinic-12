<div class="row">
    <div class="col col-md-8 well well-sm well-md">
    <?php echo form_open(current_url(),array('class'=>'form-horizontal','id'=>'edit_group_form','role'=>'form'));?>
    
    <?php if(validation_errors())
    {
      echo validation_errors();
    }?>
    
    <fieldset>    
    <legend>- <?php trP('GroupInformation')?>:</legend>
    <div><div class="form-group">
            <label for="name" class="col col-md-3 control-label"><?php trP('Name')?></label>
            <div class="col col-md-6">
            <input type="text" name='name' id="name" value="<?php echo $this->input->post('name');?>" class='form-control' placeholder="<?php trP('Name')?>" title='Name' required autofocus />
            </div>
          </div>
    <div class="form-group">
            <label for="description" class="col col-md-3 control-label"><?php trP('Description')?></label>
            <div class="col col-md-6">
            <textarea name="description" id="description" class="form-control" rows="10"><?php echo $this->input->post('description');?></textarea>
            </div>
    </div>
    <div class="form-group">
            <label for="roles[]" class="col col-md-3 control-label"><?php trP('Role')?></label>
            <div class="col col-md-6">
            <?php echo form_multiselect('roles[]', $roles, set_value('roles[]','guest'),'class="form-control" title="Role" required');?>
            </div>
    </div>
    <div class="form-group">
            <label for="members[]" class="col col-md-3 control-label"><?php trP('Members')?></label>
            <div class="col col-md-6">
            <?php echo form_multiselect('members[]', $users, set_value('members[]'),'class="form-control" title="Members"');?>
            </div>
    </div>
    <div class="form-group"><div class="col-md-offset-3">
        <div class="col col-md-6"><input type="submit" name="submit" id="submit" value=<?php trP('Add')?> class="form-control btn btn-info" /></div> 
        <div class="col col-md-6">
        <?php echo anchor('account/groups',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
        </div>
    </div></div></div></fieldset>
  <?php echo form_close(); ?>
  </div>
</div>