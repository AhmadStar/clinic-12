<?php
  echo anchor('xray/','<span class="medical-icon-i-imaging-root-category" aria-hidden="true"></span><br/>'.tr('X-rays'),array("class"=>"btn btn-lab btn-lg", "role"=>"button", "title"=>tr('ListofAllXrays')));
  echo anchor('xray/new_xray','<span class="medical-icon-i-radiology" aria-hidden="true"></span> <br/>'.tr('RegisterNewX-ray'),array("class"=>"btn btn-lab btn-lg", "role"=>"button", "title"=>tr('RegisterNewXraytoDatabase')));
?>
