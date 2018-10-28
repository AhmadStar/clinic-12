<legend >- <?php echo trP('Laboratory');?></legend>
<div>
<div class="hidden-print">
<?php echo anchor('test/new_test', tr('RegisterNewTest'),array('class'=>'btn btn-info'))?>
</div>
<?php //pagination should be added if have time.
if($tests)
{
  echo "<div>".$pagination."<div class='table-responsive'><table id='drug_list_table' class='table table-bordered table-striped'><thead><tr>
           
           <th>".tr('EnglishName')."</th>
           <th>".tr('ArabicName')."</th>
           <th>".tr('UnitPrice')."</th>
           <th>".tr('Memo')."</th>
           <th></th>
       </tr></thead><tbody>";
  $start = ($page-1) * $per_page;
  $i=0;
  foreach($tests as $test)
  {
    if($i>=(int)$start&&$i<(int)$start+(int)$per_page)
    {
        $actions = '';
        if($this->bitauth->has_role('lab'))
        {
          $actions .= anchor('test/edit/'.$test->test_id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditTest')));
          $actions .= anchor('test/delete/'.$test->test_id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'حذف التحليل'));
        }
        echo '<tr id="test'.$test->test_id.'" title="'.$test->memo.'">'.
          
          '<td>'.html_escape($test->test_name_en).'</td>'.
          '<td>'.html_escape($test->test_name_ar).'</td>'.
          '<td>'.html_escape($test->price).'</td>'.
          '<td>'.html_escape(character_limiter($test->memo, 50,'...')).'</td>'.
          '<td class="hidden-print">'.$actions.'</td>'.
        '</tr>';
    }
    $i++;
  }
  echo '</tbody></table></div>'.$pagination."</div>";
  ?>
<script>
    $(document).ready(function(){ 
        $('#drug_list_table a').on('click',function(e){
            if($(this).attr('title')=='حذف التحليل'){
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
    
</div>
