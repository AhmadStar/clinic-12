<div>
  <div class="modal fade" id="modalConfirmDelete<?php echo $income[0]['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><? trP('Delete')?> <?php echo $income[0]['id'];?></h4>
        </div>
        <div class="modal-body">
          <? trP('uwdelete')?><strong><?php echo $income[0]['doctor_id'];?></strong>.<br/><? trP('Areyousure')?>
        </div>
        <div class="modal-footer">
          <?php echo form_open('income/delete/'.$income[0]['id']);
            echo form_hidden('id',$income[0]['id']);
            echo form_hidden('del',1);?>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php trP('No')?></button>
            <input type="submit" class="btn btn-primary" value="<?php trP('Yes')?>" />
          <?php echo form_close();?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>
    $(document).ready(function(){
      $('#modalConfirmDelete<?php echo $income[0]['id'];?>').modal('show');
      $('#modalConfirmDelete<?php echo $income[0]['id'];?> form').on('submit', function(e){
          e.preventDefault();
          $.post($(this).attr('action'),$(this).serialize(),function(data){
              if(data=='ok'){
                  $('#income<?php echo $income[0]['id'];?>').remove();
                  alert('<? trP('HasBeenDeleted')?> <?php trP('Income')?><?php trP('Successfuly')?>.');
              }else if(data=='nok'){
                  alert('Incmoe is already assigned to a patient and cannot be deleted.');
              }else if(data=='mismatch'){
                  alert('Data mismatch');
              }else if(data=='invalid'){
                  alert('Invalid Data');
              }
              $('#modalConfirmDelete<?php echo $income[0]['id'];?>').modal('hide');
          });
      });
    });
  </script>
</div>