<?php
if($diagnoses)
{
  echo "<div class='table-responsive'><table class='table table-bordered table-striped'><thead><tr>
           <th>ID</th>
          <th>".tr('EnglishName')."</th>
          <th>".tr('ArabicName')."</th>          
          <th>".tr('result')."</th>
           <th></th>
       </tr></thead><tbody>";
  foreach($diagnoses as $diag)
  {
    $actions=anchor('#',tr('Assign'));
    echo '<tr id="'.$diag->id.'" title="'.$diag->description.'">'.
      '<td>'.html_escape($diag->id).'</td>'.
      '<td>'.html_escape($diag->diagnose_name_en).'</td>'.
      '<td>'.html_escape($diag->diagnose_name_ar).'</td>'.      
//      '<td><input type="number" name="no_of_item" value="1"/></td>'.
//      '<td><input type="text" name="diagnose_result" value="1"/></td>'.
      '<td><textarea name="diagnose_result" value="diagnose_result" class="form-control" rows="2">dasdas</textarea></td>'.
//      '<td><input type="text" name="diagnose_memo" value="1"/></td>'.
//      '<td><textarea name="result" id="result" value="result" class="form-control" rows="5">dasdas</textarea></td>'.
      '<td class="hidden-print">'.$actions.'</td>'.
    '</tr>';
  }?>
  </tbody></table>
  <script>
    $(document).ready(function(){
      $('#diagnoseResult a').on('click',function(e){
        e.preventDefault();
        var tr = $(this).parent().parent();
        $('#diagnose_id').val(tr.find('td:first').text());
//        $('#diagnose_no_of_item').val(tr.find('input[name="no_of_item"]').val());
//        $('#diagnose_result').val(tr.find('input[name="diagnose_result"]').val());          
          $('#diagnose_result').val(tr.find('textarea[name="diagnose_result"]').val());                   
//        $('#diagnose_memo').val(tr.find('input[name="diagnose_memo"]').val());          
//        $('#diagnose_total_cost').val(tr.find('td:nth(3)').text()*tr.find('input[name="no_of_item"]').val());
        
        $.post($('#addDiagnoseForm').attr('action'),$('#addDiagnoseForm').serialize(),function(data){
          if(data!=''){
            var paid=$('#diagnose_paid').text()*1;
            var unpaid=$('#diagnose_unpaid').text()*1;
            var trWithId = $('#diagGroup tbody tr>td[class="id"]').parent();
            if(trWithId.last().html()){
                $('#diagGroup tbody tr>td[class="id"]:last').parent().after(data);
                var data=$('#diagGroup tbody tr>td[class="id"]:last').parent();
                data.find('td:first').html((trWithId.last().find('td:first').text()*1)+1);
                var tc=data.find('.actions a:first').attr('tc')*1;unpaid+=tc;
                $('#diagnose_paid').text(paid);$('#diagnose_unpaid').text(unpaid);$('#diagnose_tc').html(unpaid+paid);
                if(paid>0) $('.diagnose_paid').removeClass('hidden'); else $('.diagnose_paid').addClass('hidden');
                if(unpaid>0) $('.diagnose_unpaid').removeClass('hidden'); else $('.diagnose_unpaid').addClass('hidden');
                if(paid>0 && unpaid>0) $('.diagnose_tc').removeClass('hidden'); else $('.diagnose_tc').addClass('hidden');
            }else{
                $('#diagGroup tbody').html(data);
                var data=$('#diagGroup tbody tr>td[class="id"]:last').parent();
                data.find('td:first').html(1);
                $('#diagGroup tbody').append('<tr class="diagnose_paid text-success hidden"><td></td><td></td><td></td><td></td><td>Paid:</td><td id="diagnose_paid">0</td><td></td></tr>');
                $('#diagGroup tbody').append('<tr class="diagnose_unpaid text-danger"><td></td><td></td><td></td><td></td><td>Unpaid:</td><td id="diagnose_unpaid">'+data.find('.actions a:first').attr('tc')+'</td><td></td></tr>');
                $('#diagGroup tbody').append('<tr class="diagnose_tc text-info hidden"><td></td><td></td><td></td><td></td><td>Total:</td><td id="diagnose_tc">'+data.find('.actions a:first').attr('tc')+'</td><td></td></tr>');
            }
            alert('<?php trP('HasBeenAdded')?><?php trP('Diagnose')?><?php trP('Successfuly')?>');    
            $('#diagGroup tr > td> a').on('click',diagnoseItemsAction);
          }
        });
      });
    });
  </script>
  </div><?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>'.tr('DiagnoseNotFound').'</h1></div>';
}
?>