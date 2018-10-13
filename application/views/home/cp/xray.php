<?php
  echo anchor('xray/','<span class="medical-icon-i-imaging-root-category" aria-hidden="true"></span><br/>'.tr('X-rays'),array("class"=>"btn btn-xray btn-lg", "role"=>"button", "title"=>"List of All Xrays"));
  echo anchor('xray/new_xray','<span class="medical-icon-i-radiology" aria-hidden="true"></span> <br/>'.tr('RegisterNewX-ray'),array("class"=>"btn btn-xray btn-lg", "role"=>"button", "title"=>"Register New Xray to Database"));
?>
