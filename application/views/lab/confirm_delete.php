<div>
  <div class="modal fade" id="modalConfirmDelete<?php echo $test->test_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php trP('Delete')?>  <?php echo $test->test_name_en;?></h4>
        </div>
        <div class="modal-body">
          <?php trP('uwdelete')?><strong><?php echo $test->test_name_en;?></strong>.<br/><?php trP('Areyousure')?>
        </div>
        <div class="modal-footer">
          <?php echo form_open('test/delete/'.$test->test_id);
            echo form_hidden('test_id',$test->test_id);
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
      $('#modalConfirmDelete<?php echo $test->test_id;?>').modal('show');
      $('#modalConfirmDelete<?php echo $test->test_id;?> form').on('submit', function(e){
          e.preventDefault();
          $.post($(this).attr('action'),$(this).serialize(),function(data){
              if(data=='ok'){
                  $('#test<?php echo $test->test_id;?>').remove();
                  alert('<?php trP('HasBeenDeleted')?> <?php trP('Test')?> <?php trP('Successfuly')?>.');
              }else if(data=='nok'){
                  alert('<?php trP('cannotbedeleted')?> <?php trP('Test')?> <?php trP('isalreadyassignedtoapatient')?>.');
                  //alert('Test is already assigned to a patient and cannot be deleted.');
              }else if(data=='mismatch'){
                  alert('<?php trP('Datamismatch')?>.');
              }else if(data=='invalid'){
                  alert('<?php trP('InvalidData')?>.');
              }
              $('#modalConfirmDelete<?php echo $test->test_id;?>').modal('hide');
          });
      });
    });
  </script>
</div>