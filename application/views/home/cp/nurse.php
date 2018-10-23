<?php
  echo anchor('nurse/','<span class="medical-icon-i-medical-library" aria-hidden="true"></span><br/>'.tr('NursesList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Nurseslist')));
  echo anchor('nurse/new_nurse','<span class="medical-icon-i-surgery" aria-hidden="true"></span> <br/>'.tr('NewNurse'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Addnewnurse')));
?>
