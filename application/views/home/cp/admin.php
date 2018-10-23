<?php
  echo anchor('account/users','<span class="glyphicon glyphicon-user"></span> <br/>'.tr('users'),array("class"=>"btn btn-primary btn-lg", "role"=>"button", "title"=>tr('UsersList')));
  echo anchor('account/signup','<i class="material-icons md-48">person_add</i> <br/>'.tr('RegisterUser'),array("class"=>"btn btn-primary btn-lg", "role"=>"button","title"=>tr('RegisterUser')));
  echo anchor('account/groups','<i class="material-icons md-48">group</i> <br/>'.tr('groups'),array("class"=>"btn btn-primary btn-lg", "role"=>"button","title"=>tr('groupsList')));
  echo anchor('account/add_group','<i class="material-icons md-48">group_add</i><br/>'.tr('CreateGroup'),array("class"=>"btn btn-primary btn-lg", "role"=>"button","title"=>tr('AddNewGroup')));
?>
