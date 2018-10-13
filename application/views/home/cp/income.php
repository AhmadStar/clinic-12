<?php
  echo anchor('income/','<span class="medical-icon-i-medical-library" aria-hidden="true"></span><br/>'.tr('IncomeList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>"Incomes list"));
  echo anchor('income/new_income','<span class="medical-icon-i-surgery" aria-hidden="true"></span> <br/>'.tr('NewIncomes'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>"Add new income"));
?>
