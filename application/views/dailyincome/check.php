<div>
  <div class="modal fade" id="modalCheckDrug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Availability Check</h4>
        </div>
        <div class="modal-body">
          You have <?php echo $all_incomes_count;?> available in the stock.<br/>
        
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