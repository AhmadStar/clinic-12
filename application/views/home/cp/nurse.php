<?php
  echo anchor('nurse/','<div data-icon="c" class="icon" style="font-size: 25px;"></div>'.tr('NursesList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Nurseslist')));

  echo anchor('nurse/new_nurse','<i class="small material-icons">add_box</i><br/>'.tr('NewNurse'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Addnewnurse')));

  echo anchor('nurse/new_schedule','<div data-icon="k" class="icon" style="font-size: 25px;"></div>'.tr('NewNurseSchedule'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Nurseslist')));

  echo anchor('nurse/new_incentive','<div data-icon="f" class="icon" style="font-size: 30px"></div>'.tr('NewNurseIncentive'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Nurseslist')));
?>
