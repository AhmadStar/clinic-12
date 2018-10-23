<?php
  echo anchor('consume/','<i class="fa fa-money" style="font-size:29px"></i> <br/>'.tr('Consume'),array("class"=>"btn btn-consume btn-lg", "role"=>"button","title"=>tr('Listofallconsumes')));
  echo anchor('consume/new_consume','<span class="medical-icon-i-billing" aria-hidden="true"></span><br/>'.tr('NewConsume'),array("class"=>"btn btn-consume btn-lg", "role"=>"button","title"=>tr('Addnewconsume')));
?>
