<div>
  <div class="modal fade bs-modal-lg" id="modalDiagnoseSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php trP('SearchDiagnose')?></h4>
        </div>
        <div class="modal-body">
          <?php
            echo form_open('',array('id'=>'formDiagnoseQ'));
            echo form_input('q','','class="form-control" id="diagnoseQ" required autofocus');
            echo form_close();
            echo "<p></p>";
          ?>
          <div id="diagnoseResult"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><?php trP('cancel')?></button>
          <button type="button" class="btn btn-success" data-dismiss="modal"><?php trP('Add')?></button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('#modalDiagnoseSearch').modal('show');
      $('#diagnoseQ').keyup(function(e){
        if(e.which!=27){//if not esc
            //$.get("<?php echo site_url('diagnose/search').'/';?>"+$('#diagnoseQ').val(),'',
            $.post("<?php echo site_url('diagnose/search');?>",$('#formDiagnoseQ').serialize(),
                function(data){
                $('#diagnoseResult').html(data);
            });
        }
      });
    });
  </script>
</div>