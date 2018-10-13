<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseAdmin" data-parent="#accordion" data-toggle="collapse">
        <i class="fa fa-address-book icons" style="font-size:24px"></i> 
        <?php trP('Accounts')?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseAdmin">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <i class="material-icons materialsidebar md-48">person_add</i> <?php echo anchor('account/signup',tr('AddNewUser'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="fa fa-edit materialsidebar" style="font-size: 20px"></i> <?php echo anchor('account/edit_user/'.$this->session->userdata('ba_user_id'),tr('EditProfile'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="material-icons materialsidebar md-48">face</i> <?php echo anchor('account/users',tr('UsersList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="material-icons materialsidebar md-48">group</i> <?php echo anchor('account/groups',tr('GroupsList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="material-icons materialsidebar md-48">group_add</i> <?php echo anchor('account/add_group',tr('AddNewGroup'));?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>