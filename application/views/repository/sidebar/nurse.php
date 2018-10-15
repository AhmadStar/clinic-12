<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseNurse" data-parent="#accordion" data-toggle="collapse">
        <i class="fa fa-user-md icons" style="font-size:25px;"></i>
        <?php trP('Nurses');?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseNurse">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <i class="fa fa-user-md matr materialsidebar" style="top:2px" ></i> <?php echo anchor('nurse',tr('NursesList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="small material-icons materialsidebar" style = "margin-right: 3px">add_box</i> </span><?php echo anchor('nurse/new_nurse',tr('NewNurse'));?>
            </td>
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>