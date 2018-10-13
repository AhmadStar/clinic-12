<?php
  echo anchor('account/users','<i class="material-icons md-48">face</i> <br/>'.tr('users'),array("class"=>"btn btn-primary btn-lg", "role"=>"button", "title"=>"Users list"));
  echo anchor('account/signup','<i class="material-icons md-48">person_add</i> <br/>'.tr('RegisterUser'),array("class"=>"btn btn-primary btn-lg", "role"=>"button","title"=>"Add new user"));
  echo anchor('account/groups','<i class="material-icons md-48">group</i> <br/>'.tr('groups'),array("class"=>"btn btn-primary btn-lg", "role"=>"button","title"=>"Groups list"));
  echo anchor('account/add_group','<i class="material-icons md-48">group_add</i><br/>'.tr('CreateGroup'),array("class"=>"btn btn-primary btn-lg", "role"=>"button","title"=>"Add new group"));
?>
