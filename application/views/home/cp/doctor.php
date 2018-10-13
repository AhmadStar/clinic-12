<?php
  echo anchor('patient/','<i class="material-icons md-48">hotel</i> <br/>'.tr('Patients'),array("class"=>"btn btn-info btn-lg", "role"=>"button","title"=>"List of all Patients"));
  echo anchor('patient/waiting','<span class="glyphicon glyphicon-list-alt"></span> <br/>'.tr('WaitingList'),array("class"=>"btn btn-info btn-lg", "role"=>"button","title"=>"Waiting list"));
  echo anchor('doctor/','<i class="fa fa-user-md" style="font-size:29px;"></i> <br/>'.tr('DoctorsList'),array("class"=>"btn btn-info btn-lg", "role"=>"button","title"=>"Doctors list"));

  echo anchor('doctor/new_doctor','<i class="small material-icons" >add_box</i> <br/>'.tr('NewDoctor'),array("class"=>"btn btn-info btn-lg", "role"=>"button","title"=>"Add new doctor"));

?>
