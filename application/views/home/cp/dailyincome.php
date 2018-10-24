<?php
  echo anchor('dailyincome/','<div class="icon icon-dailyincome"></div>'.tr('DailyIncomeList'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('DailyIncomeslist')));
  echo anchor('dailyincome/new_dailyincome','<span class="medical-icon-i-surgery" aria-hidden="true"></span> <br/>'.tr('NewDailyIncome'),array("class"=>"btn btn-income btn-lg", "role"=>"button","title"=>tr('Addnewdailyincome')));
?>
