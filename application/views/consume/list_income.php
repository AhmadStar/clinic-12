<legend><?php echo "- ".@$title;?></legend>
<?php //pagination should be added if have time.
if($consumes)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='consume_list_table' class='table table-bordered table-striped'><thead><tr>
           <th>ID</th>
           <th>Name</th>
           <th>العدد </th>
           <th>السعر</th>
           <th>اسم الدكتور</th>
           <th>التاريخ</th>
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($consumes as $_consume)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $doctor_name = '';
        foreach($doctors as $_doctor){
            if ($_doctor->id == $_consume->doctor_id)
                $doctor_name = $_doctor->name;
        }
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {
          $actions .= anchor('consume/edit/'.$_consume->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Drug'));
          $actions .= anchor('consume/delete/'.$_consume->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Drug'));
          $actions .= anchor('consume/check/'.$_consume->id, '<span class="glyphicon glyphicon-check"></span>',array('title'=>'Check Availability'));
        }
        echo '<tr id="drug'.$_consume->id.'">'.
          '<td>'.html_escape($_consume->id).'</td>'.
          '<td>'.html_escape($_consume->name).'</td>'.
          '<td>'.html_escape($_consume->count).'</td>'.                    
          '<td>'.html_escape($_consume->price).'</td>'.                    
          '<td>'.html_escape($doctor_name).'</td>'.                    
          '<td>'.html_escape($_consume->date).'</td>'.                    
          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<script>
    $(document).ready(function(){ 
        $('#consume_list_table a').on('click',function(e){
            if($(this).attr('title')=='Delete Drug'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
        $('#consume_list_table a').on('click',function(e){
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
echo '<div class="hidden-print">'.anchor('consume/new_consume', 'Register new Consume',array('class'=>'hidden-print')).'</div>';
?>