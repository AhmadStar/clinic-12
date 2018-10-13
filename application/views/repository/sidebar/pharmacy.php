<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseDrug" data-parent="#accordion" data-toggle="collapse">
        <i class="material-icons icons" style="font-size: 25px;position: relative; top: 5px;"> local_pharmacy </i> 
        <?php trP('Drugs')?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseDrug">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <i class="material-icons materialsidebar" > local_pharmacy </i> <?php echo anchor('drug',tr('Drugs'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="glyphicon glyphicon-edit materialsidebar" style="font-size: 17px;"></span> <?php echo anchor('drug/new_drug',tr('RegisterNewDrug'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="glyphicon glyphicon-plus materialsidebar" style=" font-size: 17px;"></span> <?php echo anchor('drug/add_drug',tr('AddDrugs'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="material-icons materialsidebar" >undo</i> <?php echo anchor('drug/return_drug',tr('ReturnDrugs'));?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>