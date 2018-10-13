<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseDoctor" data-parent="#accordion" data-toggle="collapse">
        <i class="fa fa-user-md icons" style="font-size:25px;"></i>
        <?php trP('Docotors');?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseDoctor">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <i class="fa fa-user-md matr materialsidebar" style="top:2px" ></i> <?php echo anchor('doctor',tr('DoctorsList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="small material-icons materialsidebar" style = "margin-right: 3px">add_box</i> </span><?php echo anchor('doctor/new_doctor',tr('NewDoctor'));?>
            </td>
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>