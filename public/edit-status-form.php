<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}

if (isset($_POST['btnUpdate'])){
    $error = array();
    $status=$db->escapeString($fn->xss_clean($_POST['status']));
    $sql = "UPDATE recharges SET status=$status WHERE id=$ID";
    $db->sql($sql);
    $error['add_menu'] = "<section class='content-header'>
    <span class='label label-success'>Status details Updated Successfully</span>
    <h4><small><a  href='users.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Users</a></small></h4>
     </section>";


}
$data = array();
$sql = "SELECT 'status' FROM recharges WHERE id = '$ID'";
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row)
    $data = $row;
?>
<section class="content-header">
    <h1>Edit Status</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Status</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_plan_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                <label for="">Select Status</label> <i class="text-danger asterik">*</i> <?php echo isset($error['status']) ? $error['status'] : ''; ?><br>
                                    <select id="status" name="status"   class="form-control">
                                        
                                        <option  value="1" <?=$data['status'] == '1' ? ' selected="selected"' : '';?> >Received</option>
                                        <option  value="0" <?=$data['status'] == '0' ? ' selected="selected"' : '';?> >Processed</option>
                                    </select>
                                </div>
                                
                            </div>

                        </div>
                       

                       
                        
                        
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Update" name="btnUpdate" />&nbsp;
                        
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#edit_status_form').validate({

        ignore: [],
        debug: false,
        rules: {
            status: "required",
            

        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>