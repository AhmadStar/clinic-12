<legend class="legend_colour">-
    <?php echo trP('NurseIncetivesList');?>
</legend>
<div class="form-group">
    <div class="col-md-12">
        <legend class="legend_colour">
            <?php echo  tr('Allincentives').' '.$allincentives ;?>
        </legend>
    </div>
</div>
<?php //pagination should be added if have time.
if($nurseincentives)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='nurse_list_table' class='table table-bordered table-striped'><thead><tr>
           <th>".tr('ID')."</th>
           <th>".tr('IncentiveAmount')."</th>
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($nurseincentives as $_nurse_incentive)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $actions = '';
        if($this->bitauth->has_role('pharmacy'))
        {          
          $actions .= anchor('nurse/editincentive/'.$_nurse_incentive->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Nurse'));
        }
        echo '<tr id="Doctor'.$_nurse_incentive->id.'">'.
          '<td>'.html_escape($_nurse_incentive->id).'</td>'.             
          '<td>'.html_escape($_nurse_incentive->amount).'</td>'. 
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
            if ($(this).attr('title') == 'Delete Doctor') {
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
<?php
}
?>
