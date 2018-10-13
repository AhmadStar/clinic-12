<legend class="legend_colour"><?php echo "- ".trP('PatientList');?></legend>
<div class="hidden-print">
<?php echo anchor('patient/register', tr('RegisterPatient'),array('class'=>'btn btn-info'))?>
</div>
<?php //pagination should be added if have time.
if(!empty($patients))
{
    echo "<div>".$pagination."<div class='table-responsive'><table class='table table-bordered table-striped'><thead><tr>

           <th>".tr('FirstName')."</th>
           <th>".tr('FatherName')."</th>
           <th>".tr('Phone')."</th>
           <th>".tr('Age')."</th>
           <th>".tr('G')."</th>
           <th></th>
       </tr></thead><tbody>";
    $start = ($page-1) * $per_page;
    $i=0;
    foreach ($patients as $_patient) 
    {
       if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
       {
            $actions = anchor('patient/panel/'.$_patient->patient_id, '<span class="glyphicon glyphicon-cog"></span>',array('title'=>'Patient Control Panel'));
            if($this->bitauth->has_role('receptionist'))
            {
              $actions .= anchor('patient/edit_patient/'.$_patient->patient_id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Patient'));
            }

            echo '<tr id="'.$_patient->patient_id.'" title="'.$_patient->memo.'">'.
              
              '<td>'.html_escape($_patient->first_name.' '.$_patient->last_name).'</td>'.
              '<td>'.html_escape($_patient->fname).'</td>'.
              '<td>'.html_escape($_patient->phone).'</td><td>';
              if(isset($_patient->birth_date))echo ((int)date('Y'))-((int)date('Y',$_patient->birth_date));else echo ''; echo'</td><td>';
              if($_patient->gender) echo tr('Male') ;else echo tr('Female'); echo '</td>'.
              '<td class="hidden-print">'.$actions.'</td>'.
            '</tr>';
        }
        $i++;
    }
    echo "</tbody></table></div>".$pagination."</div>";
}
//echo '<div class="hidden-print">'.anchor('patient/register', tr('RegisterPatient'),array('class'=>'hidden-print')).'</div>';
?>