<legend class="legend_colour">- <?php echo trP('NurseSceduleList'),'  '.$nursename;?></legend>
<div class="row">
    <div class="col col-md-12 well well-sm">
<div class="form-group">
    <div class="col-md-12">
        <legend >
            <?php echo  tr('allhourworks')?><b id="work_hours"></b>
        </legend>
    </div>
    <div class="col-md-12">
        <legend >
            <?php echo  tr('allnurseincome')?><b id="day_fare"></b>
        </legend>
    </div>
</div> 
    </div>
</div>
<div>
<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" ><?php trP('HourWorkFilter')?></h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal filter-body">                   
                    <div class="form-group">                        
                        
                        <div class="col-md-4">
                            <input type="text" data-date-format="yyyy-mm-dd" autocomplete="off" name="max" id="max" class="form-control" placeholder="<?php trP('MaximumDate:')?>" title='max' required />
                        </div>
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('MaximumDate:')?></label>
                        
                        <div class="col-md-4">
                            <input type="text" data-date-format="yyyy-mm-dd" autocomplete="off" name="min" id="min" class="form-control" placeholder="<?php trP('MinimumDate:')?>" title='min' required />
                        </div>
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('MinimumDate:')?></label>
                        
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
  <table id="nurse_list_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><?php trP('Number')?></th>
                    <th><?php trP('Date')?></th>
                    <th><?php trP('WorkHours')?></th>
                    <th><?php trP('Price')?></th>                                       
                    <th><?php trP('DayFare')?></th>                    
                    <th></th>                    
                </tr>
            </thead>
            <tbody>
            </tbody>                 
        </table>
        
<script type="text/javascript">
      
var table;

$(document).ready(function() {

    //datatables
    table = $('#nurse_list_table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searchable": false,
        "searching": false,
//        "bPaginate": false,
        "bInfo" : false,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('nurse/ajax_nurse_schedule')?>",
            "type": "POST",
            "data": function ( data ) {                
                data.nurse_id = <?php echo $nurse_id?>;
                data.min_date = $('#min').datepicker({ dateFormat: 'yy-mm-dd' }).val();
                data.max_date = $('#max').datepicker({ dateFormat: 'dd-mm-yy' }).val();
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
        loadTotal_work_hours();
        loadTotal_nurse_income();
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
});

</script>        
        

<script>
    $(document).ready(function(){ 
        $('#nurse_list_table').on('click','a',function(e){
            if($(this).attr('title')=='Delete nurse'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
    });
	
	function HandleActions(){
		$('#nurse_list_table').on('click','a',function(e){
            if($(this).attr('title')=='Delete nurse'){
               e.preventDefault();
               $.get($(this).attr('href'),'',function(data){
                   $('#tmpDiv').html(data);
               });
            }
        });
	}
	
	function loadTotal_work_hours(){
		$.ajax({
        url: '<?php echo site_url('nurse/get_total_work_hours')?>',
        type: 'POST',
        data: {
            min_date : $('#min').datepicker({ dateFormat: 'yy-mm-dd' }).val(),
            max_date : $('#max').datepicker({ dateFormat: 'dd-mm-yy' }).val(),
            nurse_id : <?php echo $nurse_id?>
        },
        dataType: 'json',
        success: function(data) {
			HandleActions();
//			alert(data.data[0].total);            
            $("#work_hours").html(data.data[0].work_hours);
//            console.log(data);
        }
    });
	}
               
    function loadTotal_nurse_income(){
		$.ajax({
        url: '<?php echo site_url('nurse/get_total_nurse_income')?>',
        type: 'POST',
        data: {
            min_date : $('#min').datepicker({ dateFormat: 'yy-mm-dd' }).val(),
            max_date : $('#max').datepicker({ dateFormat: 'dd-mm-yy' }).val(),
            nurse_id : <?php echo $nurse_id?>
        },
        dataType: 'json',
        success: function(data) {
			HandleActions();
//			alert(data.data[0].total);            
            $("#day_fare").html(data.data[0].day_fare);
//            console.log(data);
        }
    });
	}
</script>
</div>