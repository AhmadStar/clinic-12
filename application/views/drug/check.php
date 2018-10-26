<div>
  <div class="modal fade" id="modalCheckDrug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php echo trP('DrugInformations')?></h4>
        </div>
        <div class="modal-body">
          <?php echo tr('Youhave').' '.$count.' '.tr('availableinthestock')?>.<br/>
          <?php echo tr('Purchased').': '.$all_drugs_count?><br/>
          <?php echo tr('Returned').': '.$returned_drugs_count?><br/>
          <?php echo tr('Sold').': '.$sold_drugs_count?><br/>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('#modalCheckDrug').modal('show');
    });
  </script>
</div>