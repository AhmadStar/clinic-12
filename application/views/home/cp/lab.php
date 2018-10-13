<?php
  echo anchor('test/','<span class="medical-icon-i-laboratory " aria-hidden="true"></span> <br/>'.tr('Laboratory'),array("class"=>"btn btn-lab btn-lg", "role"=>"button", "title"=>"List of All Tests"));
  echo anchor('test/new_test','<span class="medical-icon-i-immunizations" aria-hidden="true" style = 35px></span> <br/>'.tr('RegisterNewTest'),array("class"=>"btn btn-lab btn-lg", "role"=>"button", "title"=>"Register New Test to Database"));
?>