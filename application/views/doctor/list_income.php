<legend class="legend_colour"><?php echo "- ".trP('DoctorIncomeList');?></legend>

<div class="form-group">       
    <div class="form-group">
    <div class="col-md-6">
        <legend class="legend_colour"><?php echo  tr('AllIncome').$allmoney ;?></legend>
    </div>
    <div class="col-md-6">
        <legend class="legend_colour"><?php echo tr('StaticIncome').$allstatic ;?></legend>
    </div>
    <div class="col-md-6">
        <legend class="legend_colour"><?php echo  tr('NormalIncome').$allnormal ;?></legend>
    </div>
    <div class="col-md-6">
        <legend class="legend_colour"><?php echo  tr('NormalPureIncome').$allnormal*0.6 ;?></legend>
    </div>
    <div class="col-md-6">
        <legend class="legend_colour"><?php echo  tr('AllPureIncome'). ($allstatic + $allnormal*0.6) ;?></legend>
    </div>
    <div class="col-md-6">
        <legend class="legend_colour"><?php echo  tr('CenterIncome'). ($allnormal*0.4) ;?></legend>
    </div>
  </div>    
</div>



<?php //pagination should be added if have time.
if($doctorincomes)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='doctor_list_table' class='table table-bordered table-striped'><thead><tr>
           <th>ID</th>                      
           <th>المبلغ </th>           
           <th>اسم المريض</th>           
           <th>نوع المعاينة</th>           
           <th>تاريخ الانشاء</th>           
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($doctorincomes as $_doctor_income)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {     
        $patient_name = '';
        foreach($patients as $_patient){
            if ($_patient->patient_id == $_doctor_income['patient_id'])
                $patient_name = $_patient->first_name.' '.$_patient->last_name;
        }
        
        
        echo '<tr id="Doctor'.$_doctor_income['id'].'">'.
          '<td>'.html_escape($_doctor_income['id']).'</td>'.
          '<td>'.html_escape($_doctor_income['amount']).'</td>'.
          '<td>'.html_escape($patient_name).'</td>'.    
          '<td>'.html_escape($type_options[$_doctor_income['type']]).'</td>'.          
          '<td>'.html_escape($_doctor_income['date']).'</td>'.          
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>        
  
<script>
    $(document).ready(function(){ 
        $('#doctor_list_table a').on('click',function(e){
            if($(this).attr('title')=='Delete Doctor'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
        $('#doctor_list_table a').on('click',function(e){
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