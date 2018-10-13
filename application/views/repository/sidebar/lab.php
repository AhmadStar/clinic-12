<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseLab" data-parent="#accordion" data-toggle="collapse">
        <span class="medical-icon-i-laboratory icons" aria-hidden="true" style="font-size: 25px"></span> 
        <?php trP('Laboratory')?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseLab">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <span class="medical-icon-i-laboratory materialsidebar" style="top:2px" aria-hidden="true"></span> <?php echo anchor('test',tr('Laboratory'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="medical-icon-i-immunizations materialsidebar" style="top:2px" aria-hidden="true" style="35px"></span> <?php echo anchor('test/new_test',tr('RegisterNewTest'));?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>