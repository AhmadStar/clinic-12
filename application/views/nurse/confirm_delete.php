<div>
  <div class="modal fade" id="modalConfirmDelete<?php echo $nurse[0]['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php trP('Delete')?> <?php echo $nurse[0]['id'];?></h4>
        </div>
        <div class="modal-body">
          <?php trP('uwdelete')?><strong><?php echo $nurse[0]['name'];?></strong>.<br/><?php trP('Areyousure')?>
        </div>
        <div class="modal-footer">
          <?php echo form_open('nurse/delete/'.$nurse[0]['id']);
            echo form_hidden('id',$nurse[0]['id']);
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
      $('#modalConfirmDelete<?php echo $nurse[0]['id'];?>').modal('show');
      $('#modalConfirmDelete<?php echo $nurse[0]['id'];?> form').on('submit', function(e){
          e.preventDefault();
          $.post($(this).attr('action'),$(this).serialize(),function(data){
              if(data=='ok'){
                  $('#nurse<?php echo $nurse[0]['id'];?>').remove();
                  alert('<?php trP('HasBeenDeleted')?> <?php echo $nurse[0]['name'];?> <?php trP('Successfuly')?>.');
              }else if(data=='nok'){
                  alert('Nurse is already assigned to a patient and cannot be deleted.');
              }else if(data=='mismatch'){
                  alert('Data mismatch');
              }else if(data=='invalid'){
                  alert('Invalid Data');
              }
              $('#modalConfirmDelete<?php echo $nurse[0]['id'];?>').modal('hide');
          });
      });
    });
  </script>
</div>