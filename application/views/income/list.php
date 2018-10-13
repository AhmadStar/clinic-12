<legend class="legend_colour"><?php echo "- ".trP('IncomeList');?></legend>
<div class="hidden-print">
<?php echo anchor('income/new_income', tr('NewIncomes'),array('class'=>'btn btn-info'))?>
</div>

<?php //pagination should be added if have time.

if($incomes)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='income_list_table' class='table table-bordered table-striped'><thead><tr>
                   
           <th>".tr('DoctorName')."</th>
           <th>".tr('PatientName')."</th>
           <th>".tr('Price')."</th>           
           <th>".tr('IncomeType')."</th>           
           <th>".tr('CreatedDate')."</th>           
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($incomes as $_income)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $doctor_name = '';
        $patient_name = '';
        foreach($doctors as $_doctor){
            if ($_doctor->id == $_income['doctor_id'])
                $doctor_name = $_doctor->name;
        }
        
        foreach($patients as $_patient){
            if ($_patient->patient_id == $_income['patient_id'])
                $patient_name = $_patient->first_name.' '.$_patient->last_name;
        }
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {
          $actions .= anchor('income/edit/'.$_income['id'], '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Income'));
          $actions .= anchor('income/delete/'.$_income['id'], '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Income'));
          /*$actions .= anchor('income/check/'.$_income['id'], '<span class="glyphicon glyphicon-check"></span>',array('title'=>'Check Availability'));*/
        }
        echo '<tr id="income'.$_income['id'].'">'.
          
          '<td>'.html_escape($doctor_name).'</td>'.                      
          '<td>'.html_escape($patient_name).'</td>'.                      
          '<td>'.html_escape($_income['amount']).'</td>'.                              
          '<td>'.html_escape($type_options[$_income['type']]).'</td>'.
          '<td>'.html_escape($_income['date']).'</td>'.                              
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
<!-- <?php
}
echo '<div class="col-md-6">'.anchor('income/new_income', tr('NewIncomes'),array('class'=>'form-control btn btn-info')).'</div>';
?> -->