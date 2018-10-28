<legend >- <?php echo trP('DiagnoseList');?></legend>
<div>
<div class="hidden-print">
<?php echo anchor('diagnose/new_diagnose', tr('NewDiagnose'),array('class'=>'btn btn-info'))?>
</div>

<?php //pagination should be added if have time.

if($diagnoses)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='diagnose_list_table' class='table table-bordered table-striped'><thead><tr>
                   
           <th>".tr('diagnose_name_en')."</th>
           <th>".tr('diagnose_name_ar')."</th>
           <th>".tr('description')."</th>           
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($diagnoses as $_diagnose)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {        
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {
          $actions .= anchor('diagnose/edit/'.$_diagnose['id'], '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditDiagnose')));
          $actions .= anchor('diagnose/delete/'.$_diagnose['id'], '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'حذف التشخيص'));          
        }
        echo '<tr id="diagnose'.$_diagnose['id'].'">'.                    
          '<td>'.html_escape($_diagnose['diagnose_name_en']).'</td>'.                              
          '<td>'.html_escape($_diagnose['diagnose_name_ar']).'</td>'.
          '<td>'.html_escape($_diagnose['description']).'</td>'.                              
          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<script>
    $(document).ready(function(){ 
        $('#diagnose_list_table a').on('click',function(e){
            if($(this).attr('title')=='حذف التشخيص'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
        $('#diagnose_list_table a').on('click',function(e){
            if($(this).attr('title')=='Check Availability'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
    });
</script>
<?php
}
?> 
</div>