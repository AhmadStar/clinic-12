<legend class="legend_colour"><?php echo "- ".trP('UsersList');?></legend>
<div class="hidden-print">
<?php echo anchor('account/signup', tr('RegisterUser'),array('class'=>'btn btn-info'))?>
</div>
<?php //pagination should be added as well as ajax based activation/suspention if have time.
if(!empty($users))//show list of user to admin
{
  echo "<div>".$pagination."<div class='table-responsive'><table class='table table-bordered table-striped'><thead><tr>
            <th>".tr('UserName')."</th>
           <th>".tr('Name')."</th>
           <th>".tr('FatherName')."</th>
           <th>".tr('Position')."</th>
           <th>".tr('Email')."</th>
           <th>".tr('Phone')."</th>
           <th class='hidden-print'></th>
       </tr></thead><tbody>";
        $start = ($page-1) * $per_page;
	for($i=(int)$start;$i<(int)$start+(int)$per_page;$i++)
        {
            if(isset($users[$i])) 
            {
                $_user = $users[$i];
                
		$actions = '';
		if($this->bitauth->is_admin())
		{
		  //$actions = anchor('account/users/'.$_user->user_id, '<span class="glyphicon glyphicon-user"> </span>',array('title'=>'View User Details'));
			$actions = anchor('account/edit_user/'.$_user->user_id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit User'));
			if(!$_user->active)
                          $actions .= anchor('#', '<span class="glyphicon glyphicon-play"> </span>',array('title'=>'Activate User','onclick'=>"$.ajax('".base_url()."index.php/account/activate/$_user->activation_code').done(function(){window.location='".current_url()."';});return false;"));
                        else
                          $actions .= anchor('#', '<span class="glyphicon glyphicon-pause"> </span>',array('title'=>'Suspend User','onclick'=>"$.ajax('".base_url()."index.php/account/deactivate/$_user->user_id').done(function(){window.location='".current_url()."';});return false;"));
		}
                echo '<tr id="'.$_user->user_id.'" title="'; if($_user->first_name||$_user->last_name) echo html_escape($_user->first_name.' '.$_user->last_name);else echo html_escape($_user->username); echo '">'.
			'<td>'.html_escape($_user->username).'</td>'.
			'<td>'.html_escape($_user->first_name.' '.$_user->last_name).'</td>'.
			'<td>'.html_escape($_user->fname).'</td>'.
			'<td>'.html_escape($_user->position).'</td>'.
			'<td>'.html_escape($_user->email).'</td>'.
			'<td>'.html_escape($_user->phone).'</td>'.
			'<td class="hidden-print">'.$actions.'</td>'.
		'</tr>';
            }
        }
  echo "</tbody></table></div>".$pagination."</div>";
}
if($this->bitauth->is_admin())
{
//  echo '<div>'.anchor('account/signup', tr('RegisterUser'),array('class'=>'hidden-print')).'</div>';
}
?>