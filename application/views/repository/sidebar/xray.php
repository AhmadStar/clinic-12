<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseXray" data-parent="#accordion" data-toggle="collapse">
        <span class="medical-icon-i-imaging-root-category icons" aria-hidden="true" style="font-size: 25px ;position: relative; top: 5px;"></span> 
        <?php trP('X-rays')?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseXray">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <span class="medical-icon-i-imaging-root-category materialsidebar " style="top : 2px" aria-hidden="true"></span> <?php echo anchor('xray',tr('X-rays'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="medical-icon-i-radiology materialsidebar" style="top : 2px" aria-hidden="true"></span> <?php echo anchor('xray/new_xray',tr('RegisterNewX-ray'));?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>