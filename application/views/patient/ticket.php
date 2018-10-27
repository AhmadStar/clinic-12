<legend><?php echo @$title;?></legend>
<?php 
if(!empty($patient->patient_id)){
?>
<div class="panel panel-default">
<div id="ticket">
  <div class="ticketHeader"></div>
  <div class="panel-body">
  <div class="row">
    <div class='col col-xs-6'>
      <label>Name: </label> <?php echo html_escape($patient->first_name.' '.$patient->last_name);?><br/>
      <label>Father Name: </label> <?php echo html_escape($patient->fname);?><br/>
      <label><?php trP('Gender')?>: </label> <?php echo $patient->gender?tr('Male'):tr('Female');?>
      <label>Phone: </label> <?php echo html_escape($patient->phone);?><br/>
      <label>Age: </label> <?php echo ((int)date('Y'))-((int)date('Y',$patient->birth_date));?><br/>
    </div>
    <div class="col col-xs-6">
      <label>Date: </label> <?php echo date('M d, Y H:i:s',gmt_to_local($patient->create_date,'UP45'));?><br/>
      <label>Visit ID: </label> <?php echo $patient->patient_id;?><br/>
      <label><?php echo $patient->id_type;?>: </label> <?php echo html_escape($patient->social_id);?><br/>
      <label>Doctor: </label> <?php echo html_escape($doc_info[$doctor->doctor_id]->name);?><br/>
<!--
      <?php print_r($doc_info)?>
      <?php print_r($doctor)?>
-->
    </div>
  </div>
  </div>
    </div>
    </div>
<div class="pull-right hidden-print">
  <?php echo anchor('patient', '<span class="glyphicon glyphicon-arrow-left"></span>');?> <a href="#" onclick="javascript:window.print();" title="Print Ticket"><span class="glyphicon glyphicon-print"></span></a>
</div>
<?php 
}else{
  echo '<div class="alert alert-danger text-center"><h1>Patient Not Found</h1></div><div class="pull-right" title="Go to Patients">'.anchor('patient', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}

?>