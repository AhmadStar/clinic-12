<legend class="legend_colour">- <?php echo trP('NurseSceduleList');?></legend>
<div class="form-group">
    <div class="col-md-12">
        <legend class="legend_colour">
            <?php echo  tr('allhourworks').' '.$allhourworks ;?>
        </legend>
    </div>
    <div class="col-md-12">
        <legend class="legend_colour">
            <?php echo  tr('allnurseincome').' '.$allnurseincome ;?>
        </legend>
    </div>
</div> 
<?php //pagination should be added if have time.
if($nurseschedules)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='nurse_list_table' class='table table-bordered table-striped'><thead><tr>
           <th>".tr('ID')."</th>
           <th>".tr('Date')."</th>
           <th>".tr('WorkHours')."</th>           
           <th>".tr('HourPrice')."</th>
           <th>".tr('DayFare')."</th>
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($nurseschedules as $_nurse_schedule)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    { 
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {          
          $actions .= anchor('nurse/editschedule/'.$_nurse_schedule->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditSchedule')));
        }
        echo '<tr id="Doctor'.$_nurse_schedule->id.'">'.
          '<td>'.html_escape($_nurse_schedule->id).'</td>'.
          '<td>'.html_escape($_nurse_schedule->work_date).'</td>'.              
          '<td>'.html_escape($_nurse_schedule->work_hours).'</td>'.          
          '<td>'.html_escape($_nurse_schedule->hour_price).'</td>'.
          '<td>'.html_escape($_nurse_schedule->day_fare).'</td>'.
          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<div class="pull-right" title="<?php trP('GoToNurses')?>">

    <?php echo anchor('nurse', '<button class="btn btn-return"><span>'.tr('ReturnToNurses').'</span></button>');?>
</div>
  
<script>
    $(document).ready(function(){ 
        $('#nurse_list_table a').on('click',function(e){
            if($(this).attr('title')=='Delete Doctor'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
        $('#nurse_list_table a').on('click',function(e){
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