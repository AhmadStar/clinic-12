
        <h3>Customers Data</h3>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >Custom Filter : </h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                        <label for="country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-4">
                            <?php echo $form_country; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FirstName" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="FirstName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="LastName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" id="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                </tr>
            </tfoot>
        </table>


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('customers/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.country = $('#country').val();
                data.FirstName = $('#FirstName').val();
                data.LastName = $('#LastName').val();
                data.address = $('#address').val();
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

</body>
</html>