<legend class="legend_colour">- <?php echo trP('PatientList');?></legend>
<!--
<div class="hidden-print">
<?php echo anchor('patient/register', tr('RegisterPatient'),array('class'=>'btn btn-info'))?>
</div>
-->
<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" ><?php trP('PatientFilter')?></h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal filter-body">                    
                    <div class="form-group">                        
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('FatherName')?></label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="fname">
                        </div>
                        <label for="FirstName" class="col-sm-2 control-label"><?php trP('Name')?></label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="name">
                        </div>          
                    </div>
<!--
                    <div class="form-group">                        
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('Phone')?></label>
                        <div class="col-md-4">
                            <input type="phone" class="form-control" id="phone">
                        </div>
                        <label for="LastName" class="col-sm-2 control-label"><?php trP('CreatedDate')?></label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" id="create_date">
                        </div>
                    </div>                    
-->
                    <div class="form-group">                        
                        <div class="col-sm-12">
                            <button type="button" id="btn-filter" class="btn btn-primary"><?php trP('Filter')?></button>
                            <button type="button" id="btn-reset" class="btn btn-default"><?php trP('Reset')?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th><?php trP('Name')?></th>
                    <th><?php trP('FatherName')?></th>
                    <th><?php trP('Phone')?></th>                    
                    <th><?php trP('CreatedDate')?></th>                    
                    <th><?php trP('Gender')?></th>                                                         
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
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searching": false,
      //  "bPaginate": false,
        "bInfo" : false,


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('patient/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {                
                data.first_name = $('#name').val();
//                data.last_name = $('#name').val();
                data.fname = $('#fname').val();
                data.phone = $('#phone').val();
                data.create_date = $('#created_date').val();
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
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });

});

</script>