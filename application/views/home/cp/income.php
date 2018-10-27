<?php
  echo anchor('income/','<span class="medical-icon-i-medical-library" aria-hidden="true"></span><br/>'.tr('IncomeList'),array("class"=>"btn btn-xray btn-lg", "role"=>"button","title"=>tr('Incomeslist')));
  echo anchor('income/new_income','<span class="medical-icon-i-surgery" aria-hidden="true"></span> <br/>'.tr('NewIncomes'),array("class"=>"btn btn-xray btn-lg", "role"=>"button","title"=>tr('Addnewincome')));
?>
