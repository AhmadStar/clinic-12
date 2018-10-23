<div class="tab-pane" id="diagnoses">
  <script>
    $(document).ready(function(){
      //script of assign drug click
      $('#addDiagnose').click(function(){
        $.ajax($('#addDiagnose').attr('href')).done(function(data){
          $('#tmpDiv').html(data);
        });
        return false;
      });
      //script of payment click
      $('#diagGroup tr > td> a').on('click',diagnoseItemsAction);
    });
  </script>
  <script>
    function diagnoseItemsAction(e){
        e.preventDefault();
        var csrfVal=$('form input[name="csrf_diagnose_name"]').val();
        var dpi=$(this).attr('dpi');
        var di=$(this).attr('di');
        var pi=$(this).attr('pi');
        var tc=$(this).attr('tc')*1;
        if($(this).attr('action')=='pay'){
          $.post('<?php echo site_url("diagnose/payment")."/";?>'+dpi,'csrf_diagnose_name='+csrfVal+'&diagnose_patient_id='+dpi+'&diagnose_id='+di+'&patient_id='+pi,function(data){
            if(data=='ok'){
              $('#dpi'+dpi+' .actions').html('');
              var paid = $('#diagnose_paid').text()*1; var unpaid=$('#diagnose_unpaid').text()*1;
              paid+=tc; unpaid-=tc;
              $('#diagnose_paid').text(paid);$('#diagnose_unpaid').text(unpaid);
              
              if(paid>0) $('.diagnose_paid').removeClass('hidden'); else $('.diagnose_paid').addClass('hidden');
              if(unpaid>0) $('.diagnose_unpaid').removeClass('hidden'); else $('.diagnose_unpaid').addClass('hidden');
              if(paid>0 && unpaid>0) $('.diagnose_tc').removeClass('hidden'); else $('.diagnose_tc').addClass('hidden');
            }else if(data=='mismatch'){
              alert('Payment data mismatch');
            }else if(data=='invalid'){
              alert('Invalid data');
            }
          });
        }else if($(this).attr('action')=='delete'){
          $.post('<?php echo site_url("diagnose/deletedpi")."/";?>'+dpi,'csrf_diagnose_name='+csrfVal+'&diagnose_patient_id='+dpi+'&diagnose_id='+di+'&patient_id='+pi,function(data){
            if(data=='ok'){
              $('#dpi'+dpi).remove();
              var paid=$('#diagnose_paid').text()*1;
              var unpaid=$('#diagnose_unpaid').text()*1;
              $('#diagnose_unpaid').text(unpaid-=tc);
              $('#diagnose_tc').html(unpaid+paid);
              if(unpaid>0) $('.diagnose_unpaid').removeClass('hidden'); else $('.diagnose_unpaid').addClass('hidden');
              if(paid>0&&unpaid>0) $('.diagnose_tc').removeClass('hidden'); else $('.diagnose_tc').addClass('hidden');
            }else if(data=='mismatch'){
              alert('Delete data mismatch');
            }else if(data=='invalid'){
              alert('Invalid data');
            }
          });
        }
      }
  </script>
<?php
  if(($this->bitauth->has_role('lab')))
  {
    echo '<div class="hidden-print">'.anchor('diagnose/search', tr('AssignADiagnose'),array('id'=>'addDiagnose','class'=>'btn btn-info')).'</div>';  
    //searchbox for drug + result
    //echo anchor('diagnose/search',tr('AssignADiagnose'),array('id'=>'addDiagnose'));
    //hidden form to inject info to
    echo "<div class='hidden'>".form_open('diagnose/assign',array('id'=>'addDiagnoseForm'));
    echo form_input('diagnose_id','','id="diagnose_id"');
    echo form_input('patient_id',$patient->patient_id,'id="patient_id"');
//    echo form_input('no_of_item','','id="diagnose_no_of_item"');
    echo form_input('result','','id="diagnose_result"');
//    echo form_input('total_cost','','id="diagnose_total_cost"');
//    echo form_input('memo','','id="diagnose_memo"');
    echo form_close().'</div>';
  }?>
    <div id='diagnoseError'></div>
    <div id='diagGroup' class="responsive-table">
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
          <th>#</th>
          <th><?php trP('EnglishName')?></th>
          <th><?php trP('ArabicName')?></th>          
          <th><?php trP('AssignDescription')?></th>            
          <th><?php trP('AssignDate')?></th>            
          <th><?php trP('DiagnoseResult')?></th>            
          <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(@$diagnoses){
      $i=0;$paid=0;$unpaid=0;
      foreach ($diagnoses as $diagnose) {
        //table item for each drug
        $this->diagnoses->load($diagnose->diagnose_id);
        echo '<tr id="dpi'.$diagnose->diagnose_patient_id.'"><td class="id">'.++$i.'</td>'.
            '<td>'.$this->diagnoses->diagnose_name_en.'</td>'.
            '<td>'.$this->diagnoses->diagnose_name_ar.'</td>'.            
            '<td>'.$this->diagnoses->description.'</td>'.            
            '<td>'.date("Y-m-d", $diagnose->assign_date).'</td>'.
            '<td>'.$diagnose->result.'</td>';            
//        if(!($diagnose->user_id_discharge&&$diagnose->discharge_date))
//        {
//            $unpaid+=$diagnose->total_cost;
//            echo '<td class="actions">'.anchor('#', tr('Delete'),array('dpi'=>$diagnose->diagnose_patient_id,'di'=>$diagnose->diagnose_id,'pi'=>$diagnose->patient_id,'action'=>'delete',/*'onclick'=>'drugItemsAction',*/'tc'=>$diagnose->total_cost));
//            echo '  ';
//            if($this->bitauth->has_role('receptionist'))
//            { 
////                echo anchor('#', tr('Pay'),array('dpi'=>$diagnose->diagnose_patient_id,'di'=>$diagnose->diagnose_id,'pi'=>$diagnose->patient_id,'action'=>'pay',/*'onclick'=>'drugItemsAction',*/'tc'=>$diagnose->total_cost));
//            }else{
//                echo '</td>';
//            }
//            
//        }else{
//            $paid+=$diagnose->total_cost;
//            echo '<td></td>';
//        }
        echo '</tr>';
      }
//      echo '<tr class="diagnose_paid text-success '.($paid?'':'hidden').'"><td></td><td></td><td></td><td></td><td>'.tr('Paid').':</td><td id="diagnose_paid">'.$paid.'</td><td></td></tr>';
//      echo '<tr class="diagnose_unpaid text-danger '.($unpaid?'':'hidden').'"><td></td><td></td><td></td><td></td><td>'.tr('Unpaid').':</td><td id="diagnose_unpaid">'.$unpaid.'</td><td></td></tr>';
//      echo '<tr class="diagnose_tc text-info '.($paid&&$unpaid?'':'hidden').'"><td></td><td></td><td></td><td></td><td>'.tr('Total').':</td><td id="diagnose_tc">'.($paid+$unpaid).'</td><td></td></tr>';
    }?>
    </tbody></table></div>
</div>