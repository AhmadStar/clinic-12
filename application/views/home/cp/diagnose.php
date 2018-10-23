<?php
  echo anchor('diagnose/','<span class="medical-icon-i-medical-library" aria-hidden="true"></span><br/>'.tr('DiagnoseList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Diagnoseslist')));
  echo anchor('diagnose/new_diagnose','<span class="medical-icon-i-surgery" aria-hidden="true"></span> <br/>'.tr('NewDiagnose'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Addnewdiagnose')));
?>
