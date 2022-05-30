<section class="content-header">
    <h1>
        Daily Incomes /
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
                    <!-- <div class="col-xs-6"> -->
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id='plans_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=dailyincomes" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="true" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="user_id" data-sortable="true">User Id</th>
                                    <th data-field="plan_id" data-sortable="true">Plan Id</th>
                                    <th data-field="purchased_id" data-sortable="true" >Purchased Id</th>
                                    <th data-field="credited_amount" data-sortable="true" >Credited Amount</th>
                                    
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
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const user_id = urlParams.get('id')
    function queryParams(p) {
        return {
            "user_id":  user_id
        };
    }
</script>