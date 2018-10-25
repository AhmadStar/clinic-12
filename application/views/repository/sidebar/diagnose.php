<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseDiagnose" data-parent="#accordion" data-toggle="collapse">
        <span data-icon="b" class="icon icons" aria-hidden="true" style="font-size:25px"></span>
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
              <span data-icon="b" class="icon materialsidebar" aria-hidden="true" style=" top: 2px"></span> <?php echo anchor('diagnose', tr('DiagnoseList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span data-icon="a" class="icon materialsidebar" aria-hidden="true" style=" top: 2px"></span> <?php echo anchor('diagnose/new_diagnose',tr('NewDiagnose'));?>
            </td>
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>