<legend class="legend_colour"><?php echo "- ".trP('GroupsList');?></legend>
<div class="hidden-print">
<?php echo anchor('account/add_group', tr('CreateGroup'),array('class'=>'btn btn-info'))?>
</div>
<?php
  if(!empty($groups))//show list of user to admin
  {
    echo "<div>".$pagination."<div class='table-responsive'><table class='table table-bordered table-striped'><thead><tr>
           <th>".tr('GroupID')."</th>
           <th>".tr('GroupName')."</th>
           <th>".tr('Description')."</th>
           <th class='hidden-print'></th>
          </tr></thead><tbody>";
    $start = ($page-1) * $per_page;
    for($i=(int)$start;$i<(int)$start+(int)$per_page;$i++)
    {
        if(isset($groups[$i])) 
        {
            $_group = $groups[$i];
            $actions = '';
            if($this->bitauth->is_admin())
            {
                $actions = anchor('account/edit_group/'.$_group->group_id,'<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Group'));
                $actions .= anchor('#','<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Remove Group',
                'onclick'=>"$.ajax('".base_url()."index.php/account/remove_group/$_group->group_id').done(function(data){jQuery('#tmpDiv').html(data);});return false;"));
            }

            echo '<tr title="'; if($_group->description) echo html_escape($_group->description);else echo html_escape($_group->name); echo '">'.
                    '<td>'.$_group->group_id.'</td>'.
                    '<td>'.html_escape($_group->name).'</td>'.
                    '<td>'.html_escape(sum_string($_group->description,100)).'</td>'.
                    '<td class="hidden-print">'.$actions.'</td>'.
            '</tr>';
        }
    }
    echo '</tbody></table></div>'.$pagination."</div>";
    }
    if($this->bitauth->is_admin())
    {
//            echo '<div>'.anchor('account/add_group', tr('CreateGroup'),array('class'=>'hidden-print')).'</div>';
    }
?>
