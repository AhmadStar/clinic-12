<div class="row">
    <div class="col col-md-12 well well-sm">
        <legend>-
            <?php echo @$title;?>
        </legend>
        <?php 
if(!empty($patient->patient_id)){
?>
        
            <div id="ticket">
                <div class="ticketHeader"></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col col-xs-6">
                            <label>
                                <?php trP('Date')?>: </label>
                            <?php echo date('M d, Y H:i:s',gmt_to_local($patient->create_date,'UP45'));?><br />
                            <label>
                                <?php trP('VisitID')?>: </label>
                            <?php echo $patient->patient_id;?><br />
                            <label>
                                <?php trP('Doctor')?>: </label>
                            <?php echo html_escape($doc_info[$doctor->doctor_id]->name);?><br />
                            <!--
      <?php print_r($doc_info)?>
      <?php print_r($doctor)?>
-->
                        </div>
                        <div class='col col-xs-6'>
                            <label>
                                <?php trP('Name')?>: </label>
                            <?php echo html_escape($patient->first_name.' '.$patient->last_name);?><br />
                            <label>
                                <?php trP('FatherName')?>: </label>
                            <?php echo html_escape($patient->fname);?><br />
                            <label>
                                <?php trP('Gender')?>: </label>
                            <?php echo $patient->gender?tr('Male'):tr('Female');?><br />
                            <label>
                                <?php trP('Phone')?>: </label>
                            <?php echo html_escape($patient->phone);?><br />
                            <label>
                                <?php trP('Age')?>: </label>
                            <?php echo ((int)date('Y'))-((int)date('Y',$patient->birth_date));?><br />
                        </div>

                    </div>
                </div>
            </div>
        
        <div>
        </div>
        <div class="pull-right" title="<?php echo trP('GoToPatient')?>">

            <?php echo anchor('patient', '<button class="btn btn-return"><span>'.tr('GoToPatient').'</span></button>');?>
        </div>
        <?php 
}else{
  echo '<div class="alert alert-danger text-center"><h1>Patient Not Found</h1></div><div class="pull-right" title="Go to Patients">'.anchor('patient', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}

?>
    </div>
    </div>
