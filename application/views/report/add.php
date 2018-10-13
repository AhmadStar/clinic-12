<div>
  <div class="modal fade" id="modalReportBug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('report_bug/add','id="reportBugForm"')?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php trP('ReportaBug')?></h4>
        </div>
        <div class="modal-body">
            <div><input type="text" name='subject' id="subject" value="<?php echo set_value('subject');?>" class='form-control' placeholder="<?php trP('subject')?>" title='Subject' required autofocus /></div>
            <div><input type="text" name='url' id='url' value="<?php echo set_value('url');?>" class='form-control' placeholder="<?php trP('URL')?>" title='URL' /></div>
            <div><textarea name="description" placeholder="<?php trP('description')?>" id="description" class="form-control" rows="10"><?php echo set_value('description');?></textarea></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><?php trP('cancel')?></button>
          <?php echo form_submit('submit', tr('submit'), 'class="btn btn-success"')?>
        </div>
        <?php echo form_close()?>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $('#modalReportBug').modal('show');
      $('#reportBugForm').submit(function(e){
         e.preventDefault() ;
         $.post($('#reportBugForm').attr('action'),$('#reportBugForm').serialize(),function(){
             alert('You have successfully reported a bug.');
             $('#modalReportBug').modal('hide');
         });
      });
    });
  </script>
</div>