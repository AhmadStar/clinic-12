<legend >- <?php echo trP('DailyIncomeList');?></legend>
<div>
<div class="panel panel-default">
    <div class="panel-heading">    
        <div class="panel-body" >
        <?php trP('DailyIncomesCountDuringSpecificDate')?> : <b id="total"></b>
        </div>            
    </div>
    
</div>
<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" ><?php trP('DoctorFilter')?></h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal filter-body">                    
                    <div class="form-group">                        
                        
                        <div class="col-md-4">
                            <input type="text" data-date-format="yyyy-mm-dd" autocomplete="off" name="max" id="max" class="form-control" placeholder="<?php trP('MaximumDate:')?>" title="<?php trP('MaximumDate:')?>" required />
                        </div>
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('MaximumDate:')?></label>

                        
                        <div class="col-md-4">
                            <input type="text" data-date-format="yyyy-mm-dd" autocomplete="off" name="min" id="min" class="form-control" placeholder="<?php trP('MinimumDate:')?>" title="<?php trP('MinimumDate:')?>" required />
                        </div>
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('MinimumDate:')?></label>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo form_dropdown('doctor_id',$doctor_list,'',"id='doctor_id' class='form-control'");?>
                        </div>
                    </div>                      
                    <div class="form-group">                        
                        <div class="col-sm-12">
                            <button type="button" id="btn-filter" class="btn btn-primary"><?php trP('Filter')?></button>
                            <button type="button" id="btn-reset" class="btn btn-default"><?php trP('Reset')?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  <table id="dailyincome_list_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><?php trP('Number')?></th>
                    <th><?php trP('DoctorName')?></th>
                    <th><?php trP('Date')?></th>
                    <th><?php trP('amount')?></th>                    
                    <th><?php trP('')?></th>                                                         
                </tr>
            </thead>
            <tbody>
            </tbody>                 
        </table>
        
        
<script type="text/javascript">        
var table;        
        
$(document).ready(function() {

    //datatables
    table = $('#dailyincome_list_table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searchable": false,
        "searching": false,
//        "bPaginate": false,
        "bInfo" : false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dailyincome/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.min_date = $('#min').datepicker({ dateFormat: 'yy-mm-dd' }).val();
                data.max_date = $('#max').datepicker({ dateFormat: 'dd-mm-yy' }).val();
                data.doctor_id = $('#doctor_id').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
        loadTotal();
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
});        
        
    </script>
<script>
    $(document).ready(function(){ 
        $('#dailyincome_list_table').on('click','a',function(e){
            if($(this).attr('title')=='Delete dailyIncome'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
    });
	
	function HandleActions(){
		$('#dailyincome_list_table').on('click','a',function(e){
            if($(this).attr('title')=='Delete dailyIncome'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
	}
	
	function loadTotal(){
		$.ajax({
        url: '<?php echo site_url('dailyincome/total')?>',
        type: 'POST',
        data: {
            min_date : $('#min').datepicker({ dateFormat: 'yy-mm-dd' }).val(),
            max_date : $('#max').datepicker({ dateFormat: 'dd-mm-yy' }).val(),
            doctor_id : $('#doctor_id').val()
        },
        dataType: 'json',
        success: function(data) {
			HandleActions();
//			alert(data.data[0].total);            
            $("#total").html(data.data[0].total);
//            console.log(data);
        }
    });
	}
</script>


</div>