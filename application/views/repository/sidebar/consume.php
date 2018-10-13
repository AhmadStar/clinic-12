<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseConsume" data-parent="#accordion" data-toggle="collapse">
        <i class="fa fa-money icons" style="font-size:25px ;position: relative; top: 2px;"></i>         
        <?php trP('Consumes');?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseConsume">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <i class="fa fa-money materialsidebar" style="top : 2px"></i> <?php echo anchor('consume',tr('ConsumeList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="medical-icon-i-billing materialsidebar" aria-hidden="true"> </span><?php echo anchor('consume/new_consume',tr('NewConsume'));?>
            </td>
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>