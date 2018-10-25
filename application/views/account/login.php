<div>
  <?php echo form_open('account/login',Array("id"=>"loginForm", "role"=>"form",)); ?>
    <fieldset>
      <legend><?php echo trP('Login')?></legend>
      <?php echo ( ! empty($error) ? $error : '' ); ?>
      <div class="form-group">
        <?php
          echo form_label(tr('UserName').' :','username',array('class'=>'sr-only'));
          echo form_input('username',null,"class='form-control' placeholder=".tr('Username').' '."title='User Name'");
        ?>
      </div>
      <div class="form-group">
        <?php
          echo form_label(tr('Password').' :','password',array('class'=>'sr-only'));
          echo form_password('password',null,"class='form-control' placeholder=".tr('PassWord').' '."title=".tr('Password'));
        ?>
      </div>
      <div class="checkbox">
        <?php echo form_label(form_checkbox('remember_me', 1,FALSE, 'id="remember_me"').tr('remember_me'), 'remember_me'); ?>
      </div>
      <div class="form-group">
        <?php //<a href="#">Forgot Password?</a> / <a href="#">Sign up</a> ?>
      </div>
      <div class="form-group">
        <?php echo form_submit('login',tr('Login'),'class="form-control btn btn-primary"'); ?>
      </div>
    </fieldset>
  <?php echo form_close(); ?>
</div>