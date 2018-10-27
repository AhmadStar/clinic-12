<?php 
$checkbox_conf_array=array('class'=>'checkbox-inline','style'=>'color: rgba(10,120,180,50); margin-bottom:10px;');

if(!empty($patient->patient_id)){
?>
<link rel='stylesheet' href='<?php echo base_url() ?>content/css/bootstrap-fileupload.min.css' media='screen' />
<script src='<?php echo base_url() ?>content/js/bootstrap-fileupload.js'></script>
<div class="col col-md-8 well well-md">
    <?php echo form_open_multipart('patient/edit_patient/'.$patient->patient_id,array("id"=>"editpatientForm", "role"=>"form",)); ?>
    <?php echo (!empty($error) ? $error : '' ); ?>
    <fieldset>
        <legend>-
            <?php trP('PatientInformation')?>:</legend>
        <div>
            <div class="form-group">
                <div class="col-md-9">
                    <div><input type="text" name='first_name' id="first_name" value="<?php echo set_value('first_name',$patient->first_name);?>" class='form-control' placeholder="<?php trP('FirstName')?>" title="<?php trP('FirstName')?>" required autofocus /></div>
                    <div><input type="text" name='last_name' id='last_name' value="<?php echo set_value('last_name',$patient->last_name);?>" class='form-control' placeholder="<?php trP('LastName')?>" title="<?php trP('LastName')?>" /></div>
                    <div><input type="text" name='fname' id='fname' value="<?php echo set_value('fname',$patient->fname);?>" class='form-control' placeholder="<?php trP('FatherName')?>" title="<?php trP('FatherName')?>" /></div>
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <label class="radio-inline"><input type="radio" name='gender' value="1" title=<?php trP('Male')?> <?php echo isset($_POST['gender'])?($this->input->post('gender')?'checked':''):($patient->gender?'checked':'');?> />
                            <?php trP('Male')?></label>
                        <label class="radio-inline"><input type="radio" name='gender' value="0" title=<?php trP('Female')?> <?php echo isset($_POST['gender'])?($this->input->post('gender')?'':'checked'):($patient->gender?'':'checked');?> />
                            <?php trP('Female')?></label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 120px; height: 140px;"><img src="<?php echo base_url().$patient->picture;?>" /></div>
                        <div class="text-center">
                            <span class="btn btn-file btn-default"><span class="fileupload-new"><?php trP('SelectImage')?></span><span class="fileupload-exists"><?php trP('Change')?></span>
                                <input type="file" name="picture" id="picture" /></span>
                            <a href="#" class=" fileupload-exists" data-dismiss="fileupload" style="float: none" title="<?php trP('Removetheselectedpicture')?>" &times;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </fieldset>
    <fieldset>
        <legend>-
            <?php trP('AdditionalInformation')?>:</legend>
        <div>
            <div class="form-group">
                <div class="col-md-6"><input type='email' name='email' id='email' value="<?php echo set_value('email',$patient->email);?>" class='form-control' placeholder="<?php trP('Email')?>" title="<?php trP('Email')?>" /></div>
            </div>
            <div class="form-group">
                <div class="col-md-6"><input type='phone' name='phone' id='phone' value="<?php echo set_value('phone',$patient->phone);?>" class='form-control' placeholder="<?php trP('Phone')?>" title="<?php trP('Phone')?>" required /></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="col-md-12"><input type="text" name='address' id='address' value="<?php echo set_value('address',$patient->address);?>" class='form-control' placeholder="<?php trP('Address')?>" title="<?php trP('Address')?>" /></div>
            </div>
            <div class="form-group">
                <div class="col-md-6"><input type="text" name='social_id' id='social_id' value="<?php echo set_value('social_id',$patient->social_id)?>" class='form-control' placeholder="<?php trP('SocialID')?>" title="<?php trP('SocialID')?>" /></div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <?php echo form_dropdown('id_type',$id_type_options,set_value('id_type',$patient->id_type),"class='form-control' title='ID Type'");?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <?php echo form_dropdown('doctor',$doctor_list,set_value('doctor',$doctor),"class='form-control' title=".tr('Doctor')) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6"><input type="date" name='birth_date' id='birth_date' value="<?php echo set_value('birth_date',date('Y-m-d',$patient->birth_date));?>" class='form-control' placeholder="<?php echo trP('FirstName')?>" title="<?php echo trP('Birth_Date')?>" /></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </fieldset>
    <fieldset>
        <legend>-
            <?php trP('Memo')?>:</legend>
        <div>
            <div class="form-group">
                <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"><?php echo set_value('memo',$patient->memo);?></textarea></div>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
        <div class="col-md-6">
            <?php echo anchor('patient',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="pull-right" title="<?php trP('GoToPatient'); ?>">

    <?php echo anchor('patient', '<button class="btn btn-return"><span>'.tr('ReturnToPatient').'</span></button>');?>
</div>
<?php 
}else{
  echo '<div class="alert alert-danger text-center"><h1>Patient Not Found</h1></div><div class="pull-right" title='.tr('GoToPatient').'>'.anchor('patient', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
<script>
    $(document).ready(function() {
        //script of this section
    });

</script>
