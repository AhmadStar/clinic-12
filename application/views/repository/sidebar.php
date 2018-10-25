<!--<div id='sidebar'>-->
<div id='sidebar' >
  <div id="accordion" class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse">
              <i class="material-icons md-48 icons" style="font-size: 25px; position: relative; top: 5px">hotel</i> 
              <?php trP('Patients')?>
            </a>
          </h4>
        </div>
        <div class="panel-collapse collapse in" id="collapseOne">
          <div class="panel-body" >
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <span class="medical-icon-i-registration materialsidebar" aria-hidden="true" style="font-size: "></span> <?php echo anchor('patient/register',tr('RegisterPatient'));?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="material-icons materialsidebar md-48">hotel</i> <?php echo anchor('patient/',tr('Patients'));?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span class="glyphicon glyphicon-list-alt materialsidebar"></span> <?php echo anchor('patient/waiting',tr('WaitingList'));?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php
      //load sidebar based on user Role to get list of all roles check bitauth config file
      if($this->bitauth->is_admin())
        include_once 'sidebar/admin.php';
      if($this->bitauth->is_admin())
        include_once 'sidebar/consume.php';
      if($this->bitauth->is_admin())
        include_once 'sidebar/income.php';
      if ($this->bitauth->has_role('doctor'))
        include_once 'sidebar/doctor.php';
      if ($this->bitauth->has_role('patient'))
        include_once 'sidebar/nurse.php';
      if ($this->bitauth->has_role('doctor'))
        include_once 'sidebar/diagnose.php';
      if ($this->bitauth->has_role('pharmacy'))
        include_once 'sidebar/pharmacy.php';
      if ($this->bitauth->has_role('xray'))
        include_once 'sidebar/xray.php';
      if ($this->bitauth->has_role('lab'))
        include_once 'sidebar/lab.php';
      if ($this->bitauth->has_role('receptionist'))
        include_once 'sidebar/receptionist.php';
      if ($this->bitauth->has_role('guest'))
        include_once 'sidebar/guest.php';
      if ($this->bitauth->has_role('patient'))
        include_once 'sidebar/patient.php';      
      if ($this->bitauth->has_role('patient'))
        include_once 'sidebar/dailyincome.php';
    ?>
    <script></script>
  </div>
</div>
