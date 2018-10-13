<div class="row">
 <?php if(!empty($group)){?>
    <div class="col col-md-8 well well-md">
    <?php form_open(current_url(),array('class'=>'form-horizontal','id'=>'edit_group_form','role'=>'form'));?>
	<?php if(validation_errors())
    {
      echo validation_errors();
    }?>
    <fieldset>
    <legend>- <?php trP('GroupInformation')?>:</legend>
    <div>
        <div class="form-group">
            <label for="name" class="col col-md-3 control-label"><?php trP('Name')?></label>
            <div class="col col-md-9">
            <?php echo form_input('name', set_value('name', $group->name),'class="form-control"')?>
            </div>
        </div>
		<div class="form-group">
		  <label for="description" class="col col-md-3 control-label"><?php trP('Description')?></label>
            <div class="col col-md-9">
            <?php echo form_textarea('description', set_value('description', $group->description),'class="form-control" style="height:68px;"')?>
            </div>
	   </div>
       <div class="form-group">
            <label for="roles[]" class="col col-md-3 control-label"><?php trP('Role')?></label>
            <div class="col col-md-9">
            <?php echo form_multiselect('roles[]', $roles, set_value('roles[]', $group_roles),'class="form-control" title=""')?>
            </div>
	   </div>
       <div class="form-group">
            <label for="members[]" class="col col-md-3 control-label"><?php trP('Members')?></label>
		    <div class="col col-md-9">
            <?php form_multiselect('members[]', $users, set_value('members[]', $group->members),'class="form-control"')?>
            </div>
	   </div>
    </div>
    <div class="form-group">
           <div class="col-md-offset-3">
            <div class="col col-md-6"><input type="submit" name="submit" id="submit" value=<?php trP('Update')?> class="form-control btn btn-info" /></div> 
            <div class="col col-md-6">
            <?php echo anchor('account/groups','Cancel',array('class'=>'form-control btn btn-info'))?></div>
          </div>
    </div>
</fieldset>
   <?php form_close();?>
  </div>
  <?php
	} else {		
 echo '<div class="alert alert-danger text-center"><h1>Drug Not Found</h1></div><div class="pull-right" title="Go to Consumes">'.anchor('account/groups','Go Back').'</div>';}
?>
</div>