<div class="tab-pane active" id="comments">
  <script>
    $(document).ready(function(){
      //script of this section
      $('#comment').keypress(function(e){
        if(e.which==13)
        {
          $.post($('#commentBox').attr('action'),$('#commentBox').serialize(),
            function(data){
              $('#commentGroup').prepend(data);
              $('#comment').val('');
            });
          return false;
        }
      });
    });
  </script>
<?php echo form_open('comment/add/'.$doctor->patient_doctor_id,array("id"=>"commentBox", "role"=>"form",)); ?>
    <div>
     <div class="form-group">
        <div class="col-md-6"><input type="hidden" name='patient_doctor_id' id="patient_doctor_id"
           value="<?php echo $doctor->patient_doctor_id;?>" class='form-control'/>
        </div>
        <div class="col-md-6"><input type="hidden" name='patient_id' id="patient_id"
           value="<?php echo $doctor->patient_id;?>" class='form-control'/>
        </div>        
      </div>
      <div class="form-group">
        <div class="col-md-12"><input type="text" name='comment' id='comment' value="<?php echo $this->input->post('comment');?>" class='form-control' placeholder="<?php trP('comment')?>" title='comment' /></div>        
      </div>
      <div class="form-group">
        <div class="col-md-6"><input type='Number' name='ppressure' id='ppressure' class='form-control' placeholder="<?php trP('ppressur')?>" title='ppressure' /></div>
        <div class="col-md-6"><input type="Number" name='spressur' id='spressur' value="<?php echo $this->input->post('spressur');?>" class='form-control' placeholder="<?php trP('spressur')?>" title='spressur' /></div>
      </div>
      <div class="form-group">
       <div class="col-md-6"><input type='Number' name='hrate' id='hrate' class='form-control' placeholder="<?php trP('hrate')?>" title='hrate'  /></div>
        <div class="col-md-6"><input type='Number' step=0.1 name='heate' id='heate' class='form-control' placeholder="<?php trP('heate')?>" title='heate' /></div>        
      </div>
      <div class="form-group">
        <div class="col-md-6"><input type='Number' name='nbreathing' id='nbreathing' class='form-control' placeholder="<?php trP('nbreathing')?>" title='nbreathing' /></div>
        <div class="col-md-6"><input type='Number' name='oxidation' id='oxidation' class='form-control' placeholder="<?php trP('oxidation')?>" title='oxidation'  /></div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <div class="col-md-12"><input type="submit" name='submit' id='submit' value=<?php trP('Add');?> class="form-control btn btn-info" /></div>
      </div>
      
      <?php echo form_close(); ?>
    
<!--      echo form_open('comment/add/'.$doctor->patient_doctor_id,array('id'=>'commentBox'));-->
<!--      echo form_hidden('patient_doctor_id',$doctor->patient_doctor_id);      -->
<!--      echo form_hidden('patient_id',$doctor->patient_id);      -->
<!--      echo form_input('comment','','class="form-control" id="comment"  placeholder='.tr('WYCommentAP').'');    -->
<!--      echo form_input('spressur','','class="form-control" id="spressur"  placeholder='.tr('spressur').'');    -->
<!--      echo form_input('ppressure','','class="form-control" id="ppressure"  placeholder='.tr('ppressur').'');-->
<!--      echo form_input('hrate','','class="form-control" id="hrate"  placeholder='.tr('hrate').'');  -->
<!--      echo form_input('heate','','class="form-control" id="heate"  placeholder='.tr('heate').'');-->
<!--      echo form_input('oxidation','','class="form-control" id="heate"  placeholder='.tr('oxidation').'');-->
<!--      echo form_input('nbreathing','','class="form-control" id="heate"  placeholder='.tr('nbreathing').'');-->
<!--
      echo form_submit('submit',tr('Add'));
      echo form_close();
-->
<!--      echo "<p></p>";-->
<!--
//    }
//    if(@$comments!='unauthorized'){
//      echo "<div id='commentGroup'>";
//      foreach ($comments as $comment) {
//        echo "<div id='comment".$comment->comment_id."' class='well well-md'>";
//          echo "<div class='commentBody'>".$comment->comment.'</div>';
//          echo "<div class='commentBody'>".$comment->spressur.'</div>';
//          echo "<div class='commentBody'>".$comment->ppressure.'</div>';
//          echo "<div class='commentBody'>".$comment->hrate.'</div>';
//          echo "<div class='commentBody'>".$comment->heate.'</div>';
//          echo "<div class='commentBody'>".$comment->oxidation.'</div>';
//          echo "<div class='commentBody'>".$comment->nbreathing.'</div>';
//          echo "<div class='pull-right'>".trP('CreatedDate').'  '.date('M d, Y',gmt_to_local($comment->create_date,'UP45'))."</div>";//<span class='close'>&times;</span>
//        echo "</div>";
//      }
//      echo "</div>";
//    }else{
//      echo "<div id='commentGroup'>";
//      echo "<div class='alert alert-warning'>".tr('YAAOC')."</div>";
//      echo "</div>";
//    }
-->
  
  
  <div id='labGroup' class="responsive-table">
    <table class="table table-bordered table-striped">
    <thead>
      <tr>          
          <th><?php trP('Date')?></th>
          <th><?php trP('comment')?></th>
          <th><?php trP('pressur')?></th>
<!--          <th><?php trP('ppressur')?></th>-->
          <th><?php trP('hrate')?></th>
          <th><?php trP('heate')?></th>  
          <th><?php trP('oxidation')?></th>  
          <th><?php trP('nbreathing')?></th>          
      </tr>
    </thead>
    <tbody>
    <?php      
      foreach ($comments as $comment) {
        //table item for each drug        
        
            echo '<tr>'.
            '<td>'.date('M d',gmt_to_local($comment->create_date,'UP45')).'</td>'.            
            '<td>'.$comment->comment.'</td>'.               
            '<td>'.$comment->spressur.'/'.$comment->ppressure.'</td>'.                
//            '<td>'.$comment->ppressure.'</td>'.                
            '<td>'.$comment->hrate.''.tr('minute').'</td>'.                
            '<td>'.$comment->heate.''.tr('ْ').'</td>'.                
            '<td>'.$comment->oxidation.'%'.'</td>'.                
            '<td>'.$comment->nbreathing.''.tr('minute').'</td>';                
            echo '</tr>';            
      }      
    ?>
    </tbody></table></div>
  
  
  
</div>

