<legend class="legend_colour">- <?php echo trP('DailyIncomeList');?></legend>
<div class="hidden-print">
<?php echo anchor('dailyincome/new_dailyincome', tr('NewdailyIncome'),array('class'=>'btn btn-info'))?>
</div>

<?php //pagination should be added if have time.

if($dailyincome)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='income_list_table' class='table table-bordered table-striped'><thead><tr>
                   
           <th>".tr('ID')."</th>
           <th>".tr('DoctorName')."</th>
           <th>".tr('Date')."</th>           
           <th>".tr('amount')."</th>          
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($dailyincome as $_dailyincome)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $doctor_name = '';
        foreach($doctors as $_doctor){
            
            if ($_doctor->id == $_dailyincome['doctor_id']){
                
                $doctor_name = $_doctor->name;
            }
        }
        
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {
          $actions .= anchor('dailyincome/edit/'.$_dailyincome['id'], '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Income'));
          $actions .= anchor('dailyincome/delete/'.$_dailyincome['id'], '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Income'));
        }
        echo '<tr id="dailyincome'.$_dailyincome['id'].'">'.
          '<td>'.html_escape($_dailyincome['id']).'</td>'.
          '<td>'.html_escape($doctor_name).'</td>'.
          '<td>'.html_escape($_dailyincome['date']).'</td>'.                      
          '<td>'.html_escape($_dailyincome['amount']).'</td>'.                              
          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<script>
    $(document).ready(function(){ 
        $('#income_list_table a').on('click',function(e){
            if($(this).attr('title')=='Delete Income'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
        $('#income_list_table a').on('click',function(e){
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