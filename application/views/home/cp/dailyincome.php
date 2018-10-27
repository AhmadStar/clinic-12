<?php
  echo anchor('dailyincome/','<div data-icon="d" class="icon" style="font-size:25px;"></div>'.tr('DailyIncomeList'),array("class"=>"btn btn-consume btn-lg", "role"=>"button","title"=>tr('DailyIncomeslist')));

  echo anchor('dailyincome/new_dailyincome','<div data-icon="e" class="icon" style="font-size:25px;"></div>'.tr('NewDailyIncome'),array("class"=>"btn btn-consume btn-lg", "role"=>"button","title"=>tr('Addnewdailyincome')));
?>
