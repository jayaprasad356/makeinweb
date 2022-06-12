<section class="content-header">
    <h1>
    Withdrawals /
        <small><a href="home.php"><i class="fa fa-home"></i> Home</a></small>
</h1>
</section>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-header">
                        <div class="form-group col-md-3">
                            <h4 class="box-title">Filter by Status</h4>
                            <select id="payment_status" name="payment_status" class="form-control">
                                        <option value="">All</option>
                                        <option value="Success">Success</option>
                                        <option value="Fail" >Fail</option>
                                        <option value="Refund">Refund</option>
                                        <option value="Process">Process</option>
                
                                    </select>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table id='withdrawals_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=withdrawals" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="true" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="user_id" data-sortable="true">User ID</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="mobile" data-sortable="true">Mobile</th>
                                    <th data-field="amount" data-sortable="true">Amount</th>
                                    <th data-field="payment_status" data-sortable="true" >Payment Status</th>
                                    <th data-field="date_created" data-sortable="true" >Date Created</th>
                                    <th data-field="operate" data-events="actionEvents">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="separator"> </div>
        </div>
        <!-- /.row (main row) -->
    </section>

<script>
    $('#payment_status').on('change', function() {
        $('#withdrawals_table').bootstrapTable('refresh');
    });

    function queryParams(p) {
        return {
            "payment_status": $('#payment_status').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>
