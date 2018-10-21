<div>
  <div class="modal fade" id="modalConfirmDelete<?php echo $doctor->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php trP('Delete')?>  <?php echo $doctor->name;?></h4>
        </div>
        <div class="modal-body">
          <?php trP('uwdelete')?><strong><?php echo $doctor->name;?></strong>.<br/><?php trP('Areyousure')?>
        </div>
        <div class="modal-footer">
          <?php echo form_open('doctor/delete/'.$doctor->id);
            echo form_hidden('id',$doctor->id);
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
      $('#modalConfirmDelete<?php echo $doctor->id;?>').modal('show');
      $('#modalConfirmDelete<?php echo $doctor->id;?> form').on('submit', function(e){
          e.preventDefault();
          $.post($(this).attr('action'),$(this).serialize(),function(data){
              if(data=='ok'){
                  $('#doctor<?php echo $doctor->id;?>').remove();
                  alert('<?php trP('HasBeenDeleted')?> <?php trP('Doctor')?> <?php trP('Successfuly')?>.');
              }else if(data=='nok'){
                  alert('Doctor is already assigned to a patient and cannot be deleted.');
              }else if(data=='mismatch'){
                  alert('Data mismatch');
              }else if(data=='invalid'){
                  alert('Invalid Data');
              }
              $('#modalConfirmDelete<?php echo $doctor->id;?>').modal('hide');
          });
      });
    });
  </script>
</div>