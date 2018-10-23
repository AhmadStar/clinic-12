<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseDiagnose" data-parent="#accordion" data-toggle="collapse">
        <link rel="icon" href="<?php echo base_url() ?>content/img/diagnosesIcon.png" type="image/png" sizes="16x16">
        <?php trP('Diagnoses');?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseDiagnose">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <span class="medical-icon-i-medical-library materialsidebar" aria-hidden="true" style=" top: 2px"></span> <?php echo anchor('diagnose', tr('DiagnoseList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="medical-icon-i-surgery materialsidebar" aria-hidden="true" style=" top: 2px"></span> <?php echo anchor('diagnose/new_diagnose',tr('NewDiagnose'));?>
            </td>
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>