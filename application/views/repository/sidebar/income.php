<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseIncome" data-parent="#accordion" data-toggle="collapse">
        <span class="medical-icon-i-medical-library icons" aria-hidden="true" style=" font-size: 25px; position: relative; top: 2px;"></span> 
        <?php trP('Incomes');?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseIncome">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <span class="medical-icon-i-medical-library materialsidebar" aria-hidden="true" style=" top: 2px"></span> <?php echo anchor('income', tr('IncomeList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <span class="medical-icon-i-surgery materialsidebar" aria-hidden="true" style=" top: 2px"></span> <?php echo anchor('income/new_income',tr('NewIncomes'));?>
            </td>
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>