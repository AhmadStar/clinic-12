<?php
  echo anchor('dailyincome/','<span class="medical-icon-i-medical-library" aria-hidden="true"></span><br/>'.tr('DailyIncomeList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('DailyIncomeslist')));
  echo anchor('dailyincome/new_dailyincome','<span class="medical-icon-i-surgery" aria-hidden="true"></span> <br/>'.tr('NewDailyIncome'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Addnewdailyincome')));
?>
