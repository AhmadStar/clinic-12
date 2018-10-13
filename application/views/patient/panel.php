<?php 
  $status_code=$doctor->status;

//  print_r($doctor);
  switch ($status_code) {
    case 0:
      $status='Waiting';
      break;
    case 1:
      $status='Finished';
      break;
    case 2:
      $status='Treatment';
      break;
    default:
      $status='Unknown';
      break;
  }
  if(!empty($patient->patient_id)){
?>
<div class="panel-group" id="pInfo">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#pInfo" href="#pInfoBody">
          <?php echo html_escape($patient->patient_id .' - '.$patient->first_name.' '.$patient->last_name).' (<span id="status">'.$status.'</span>)';?>
        </a>
        <?php if($status_code!=1) 
        {
          echo '<div class="pull-right" id="statusFormContainer">';
          echo form_open('patient/status/'.$doctor->patient_doctor_id,array('id'=>'statusForm')); //should return new status
          echo form_hidden('patient_doctor_id',$doctor->patient_doctor_id);
          echo form_hidden('patient_id',$patient->patient_id);
          echo form_hidden('doctor_id',$doctor->doctor_id);
          echo form_hidden('status',$status_code?1:2);
          echo form_hidden('url',current_url());
          echo form_submit('submit',$status_code?'Finish':'Accept','id="statusLink"');
          echo form_close();?>
          </div>
        <?php }?>
      </h4>
    </div>
    <div id="pInfoBody" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class='col col-xs-6'>
          <label><?php trP('FatherName')?>:</label> <?php echo html_escape($patient->fname);?><br/>
          <label><?php trP('Gender')?>: </label> <?php echo $patient->gender?tr('Male'):tr('Female');?><br/>
          <label><?php trP('Phone')?>: </label> <?php echo html_escape($patient->phone);?><br/>
          <label><?php trP('Age')?>: </label> <?php echo ((int)date('Y'))-((int)date('Y',$patient->birth_date));?><br/>
        </div>
        <div class="col col-xs-6">
          <label><?php trP('Date')?>: </label> <?php echo date('M d, Y',gmt_to_local($patient->create_date,'UP45'));?><br/>
          <label><?php echo $patient->id_type;?>: </label> <?php echo html_escape($patient->social_id);?><br/>
          
          <label><?php trP('Doctor')?>: </label> <?php echo html_escape($doc_info[$doctor->doctor_id]->name);?><br/>          
<!--          <?php print_r($doc_info);?>-->
          <label><?php trP('Email')?>: </label> <?php echo html_escape($patient->email);?><br/>
        
        <?php if($patient->address) echo '<label> '.tr('Address').':</label>'.html_escape($patient->address).'<br/>';if($patient->memo) echo '<label>Memo: </label>'.html_escape($patient->memo).'<br/>';echo '<div class="pull-right" title="Go to Patients">'.anchor('patient', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';?>
          </div>
      </div>
    </div>
  </div>
</div>
<div>
  <ul class="nav nav-tabs" id="panelTab">
    <li class="active"><a href="#comments" data-toggle="tab"><?php trP('comments')?></a></li>
    <li><a href="#drugs" data-toggle="tab"><?php trP('Drugs')?></a></li>
    <li><a href="#xrays" data-toggle="tab"><?php trP('X-rays')?></a></li>
    <li><a href="#labs" data-toggle="tab"><?php trP('Laboratory')?></a></li>
  </ul>
  
  <div class="tab-content">
    <style>.tab-pane{padding-top: 10px;}</style>
    <?php
      include_once 'panel/comments.php';
      include_once 'panel/drugs.php';
      include_once 'panel/labs.php';
      include_once 'panel/xrays.php';
    ?>
  </div>
  <script>
    $(function () {
      $('#panelTab a:first').tab('show')
    })
  </script>
</div>
    <?php
  }else{
    echo '<div class="alert alert-danger text-center"><h1>Patient Not Found</h1></div><div class="pull-right" title="Go to Patients">'.anchor('patient', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
  }
?>