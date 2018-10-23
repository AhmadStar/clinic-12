<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('account/signup',array("id"=>"signupForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('UserInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='first_name' id="first_name" value="<?php echo $this->input->post('first_name');?>" class='form-control' placeholder="<?php trP('FirstName')?>" title='First Name' required autofocus /></div>
                    <div class="col-md-6"><input type="text" name='last_name' id='last_name' value="<?php echo $this->input->post('last_name');?>" class='form-control' placeholder="<?php trP('LastName')?>" title='Last Name' /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='fname' id='fname' value="<?php echo $this->input->post('fname');?>" class='form-control' placeholder="<?php trP('FatherName')?>" title='Father Name' /></div>
                    <div class="col-md-6">
                        <label class="radio-inline"><input type="radio" name='gender' value="1" title='Male' <?php echo isset($_POST['gender'])?($this->input->post('gender')?'checked':''):'';?> />
                            <?php trP('Male')?></label>
                        <label class="radio-inline"><input type="radio" name='gender' value="0" title='Female' <?php echo isset($_POST['gender'])?($this->input->post('gender')?'':'checked'):'';?> />
                            <?php trP('Female')?></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="col-md-12"><input type="text" name='username' id='username' value="<?php echo $this->input->post('username');?>" class='form-control' placeholder="<?php trP('UserName')?>" title='User Name' required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type='password' name='password' id='password' class='form-control' placeholder="<?php trP('Password')?>" title='Password' required /></div>
                    <div class="col-md-6"><input type='password' name='password_conf' id='password_conf' class='form-control' placeholder="<?php trP('ConfirmPassword')?>" title='Confirm Password' required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type='email' name='email' id='email' value="<?php echo $this->input->post('email');?>" class='form-control' placeholder="<?php trP('Email')?>" title='Email' required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type='phone' name='phone' id='phone' value="<?php echo $this->input->post('phone');?>" class='form-control' placeholder="<?php trP('Phone')?>" title='Phone' required /></div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="col-md-12"><input type="text" name='address' id='address' value="<?php echo $this->input->post('address');?>" class='form-control' placeholder="<?php trP('Address')?>" title='Address' /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6"><input type="text" name='social_id' id='social_id' value="<?php echo $this->input->post('social_id')?>" class='form-control' placeholder='Social ID' title='Social ID' required /></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <?php echo form_dropdown('id_type',$id_type_options,$this->input->post('id_type'),"class='form-control' title='ID Type'");?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <?php echo form_dropdown('position',$roles_option,$this->input->post('position'),"class='form-control' title='Position'");?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group date col-md-6">
                        <input type="text" data-date-format="yyyy-mm-dd" autocomplete="off" name="birth_date" id="birth_date" value="<?php echo $this->input->post('birth_date');?>" class="form-control" placeholder="<?php echo trP('pressToAddDate')?>" title='birth_date' required />
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </fieldset>
        <fieldset>
            <legend>+
                <?php trP('Memo')?>:</legend>
            <div style="display: none;">
                <div class="form-group">
                    <div class="col-md-12"><textarea name="memo" id="memo" class="form-control" rows="10"><?php echo $this->input->post('memo');?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trP('Register');?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('account/users',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#birth_date').datepicker({
        });
    });

</script>

