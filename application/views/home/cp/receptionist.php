<?php
  //if(!$this->bitauth->has_role('doctor')) echo anchor('patient/','<span class="glyphicon glyphicon-user"></span> <br/>Patients',array("class"=>"btn btn-success btn-lg", "role"=>"button"));
  echo anchor('patient/register','<span class="medical-icon-i-registration" aria-hidden="true"></span> <br/>'.tr('RegisterPatient'),array("class"=>"btn btn-info btn-lg", "role"=>"button","title"=>"Register new patient"));
  //if(!$this->bitauth->has_role('doctor')) echo anchor('patient/waiting','<span class="glyphicon glyphicon-user"></span> <br/>Waiting List',array("class"=>"btn btn-success btn-lg", "role"=>"button"));
?>
