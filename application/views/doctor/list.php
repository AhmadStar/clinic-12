<legend class="legend_colour"><?php echo "- ".trP('DoctorsList');?></legend>
<div class="hidden-print">
<?php echo anchor('doctor/new_doctor', tr('NewDoctor'),array('class'=>'btn btn-info'))?>
</div>
<?php //pagination should be added if have time.
if($doctors)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='doctor_list_table' class='table table-bordered table-striped'><thead><tr>
           
           <th>".tr('DoctorName')."</th>
           <th>".tr('Address')."</th>           
           <th>".tr('Phone')."</th>           
           <th>".tr('CreatedDate')."</th>
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($doctors as $_doctor)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $actions = '';
        if($this->bitauth->has_role('admin'))
        {
          $actions .= anchor('doctor/edit/'.$_doctor->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Doctor'));
          $actions .= anchor('doctor/delete/'.$_doctor->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Doctor'));
          $actions .= anchor('doctor/incomelist/'.$_doctor->id, '<span class="glyphicon glyphicon-check"></span>',array('title'=>'Check Income'));
        }
        echo '<tr id="Doctor'.$_doctor->id.'">'.
//          '<td>'.html_escape($_doctor->id).'</td>'.
          '<td>'.html_escape($_doctor->name).'</td>'.
          '<td>'.html_escape($_doctor->address).'</td>'.                              
          '<td>'.html_escape($_doctor->phone).'</td>'.                    
          '<td>'.html_escape($_doctor->created_date).'</td>'.                    
          '<td class="hidden-print">'.$actions.'</td>'.
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
<!--
<?php
}
echo '<div class="hidden-print">'.anchor('doctor/new_doctor', tr('NewDoctor'),array('class'=>'hidden-print')).'</div>';
?>-->
