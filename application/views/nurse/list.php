<legend class="legend_colour">-
    <?php echo trP('NursesList');?>
</legend>
<div class="hidden-print">
    <?php echo anchor('nurse/new_nurse', tr('NewNurse'),array('class'=>'btn btn-info'))?>
</div>

<?php //pagination should be added if have time.

if($nurses)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='nurse_list_table' class='table table-bordered table-striped'><thead><tr>
                   
           <th>".tr('NurseName')."</th>
           <th>".tr('Age')."</th>
           <th>".tr('Phone')."</th>           
           <th>".tr('Address')."</th>           
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($nurses as $_nurse)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {          
          $actions .= anchor('nurse/Edit/'.$_nurse['id'], '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Nurse'));
          $actions .= anchor('nurse/delete/'.$_nurse['id'], '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete nurse'));
          $actions .= anchor('nurse/nurseschedule/'.$_nurse['id'], '<span class="glyphicon glyphicon-check"></span>',array('title'=>'Nurse Hours Work'));
          $actions .= anchor('nurse/nurseincentive/'.$_nurse['id'], '<span class="glyphicon glyphicon-check"></span>',array('title'=>'Nurse Incentives'));
        }
        echo '<tr id="nurse'.$_nurse['id'].'">'.
                            
          '<td>'.html_escape($_nurse['name']).'</td>'.
          '<td>'.html_escape($_nurse['age']).'</td>'.
          '<td>'.html_escape($_nurse['phone']).'</td>'.
          '<td>'.html_escape($_nurse['address']).'</td>'.

          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<script>
    $(document).ready(function() {
        $('#nurse_list_table a').on('click', function(e) {
            if ($(this).attr('title') == 'Delete nurse') {
                e.preventDefault();
                $.get($(this).attr('href'), '', function(data) {
                    $('#tmpDiv').html(data);
                });
            }
        });
        $('#nurse_list_table a').on('click', function(e) {
            if ($(this).attr('title') == 'Check Availability') {
                e.preventDefault();
                $.get($(this).attr('href'), '', function(data) {
                    $('#tmpDiv').html(data);
                });
            }
        });
    });

</script>
<!-- <?php
}
echo '<div class="col-md-6">'.anchor('nurse/new_nurse', tr('Newnurses'),array('class'=>'form-control btn btn-info')).'</div>';
?> -->
