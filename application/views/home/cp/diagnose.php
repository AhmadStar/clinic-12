<?php
  echo anchor('diagnose/','<div data-icon="b" class="icon" style="font-size:25px;"></div>'.tr('DiagnoseList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Diagnoseslist')));

  echo anchor('diagnose/new_diagnose','<div data-icon="a" class="icon" style="font-size:25px;"></div>'.tr('NewDiagnose'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Addnewdiagnose')));
?>
