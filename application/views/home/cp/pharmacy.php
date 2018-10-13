<?php
  echo anchor('drug/','<i class="material-icons"> local_pharmacy </i> <br/>'.tr('Drugs'),array("class"=>"btn btn-drug btn-lg", "role"=>"button", "title"=>"List of All Drugs"));
  echo anchor('drug/new_drug','<span class="glyphicon glyphicon-edit"></span> <br/>'.tr('RegisterNewDrug'),array("class"=>"btn btn-drug btn-lg", "role"=>"button", "title"=>"Register New Drugs to Database"));
  echo anchor('drug/add_drug','<span class="glyphicon glyphicon-plus"></span> <br/>'.tr('AddDrugs'),array("class"=>"btn btn-drug btn-lg", "role"=>"button", "title"=>"Add Purchased Drugs to Database"));
  echo anchor('drug/return_drug','<i class="material-icons">undo</i><br/>'.tr('ReturnDrugs'),array("class"=>"btn btn-drug btn-lg", "role"=>"button", "title"=>"Return Drugs"));
?>
