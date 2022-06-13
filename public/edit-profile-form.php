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
    $name=$db->escapeString($fn->xss_clean($_POST['name']));
    $mobile=$db->escapeString($fn->xss_clean($_POST['mobile']));
    $balance=$db->escapeString($fn->xss_clean($_POST['balance']));
    $earn=$db->escapeString($fn->xss_clean($_POST['earn']));
    $status=$db->escapeString($fn->xss_clean($_POST['status']));

    $account_no=$db->escapeString($fn->xss_clean($_POST['account_no']));
    $ifsc_code=$db->escapeString($fn->xss_clean($_POST['ifsc_code']));
    $bank_name=$db->escapeString($fn->xss_clean($_POST['bank_name']));
    if (empty($name)) {
        $error['name'] = " <span class='label label-danger'>Required!</span>";
    }
    if (empty($mobile)) {
        $error['mobile'] = " <span class='label label-danger'>Required!</span>";
    }
    if (!empty($name)&& !empty($mobile))
    {
        $sql = "UPDATE users SET name='$name',mobile='$mobile',balance='$balance',earn='$earn',status='$status',
        account_no='$account_no',ifsc_code='$ifsc_code',bank_name='$bank_name' WHERE id=$ID";
        $db->sql($sql);
        $user_result = $db->getResult();
        if (!empty($user_result)) {
            $user_result = 0;
        } else {
            $user_result = 1;
        }
        if ($user_result == 1) {
            $error['add_menu'] = "<section class='content-header'>
                                            <span class='label label-success'>User profile details Updated Successfully</span>
                                            <h4><small><a  href='users.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to users</a></small></h4>
                                             </section>";
        } else {
            $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
        }

    }
}
    
$data = array();
$sql = "SELECT * FROM users WHERE id = '$ID'";
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row)
    $data = $row;
?>
<section class="content-header">
    <h1>Edit Profile</h1>
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
                    <h3 class="box-title">Edit Profile</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='edit_profile_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name"  value="<?php echo $data['name']?>" required>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Mobile Number</label> <i class="text-danger asterik">*</i><?php echo isset($error['mobile']) ? $error['mobile'] : ''; ?>
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $data['mobile']?>" required>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Account Number</label> <i class="text-danger asterik">*</i><?php echo isset($error['account_no']) ? $error['account_no'] : ''; ?>
                                    <input type="text" class="form-control" name="account_no" value="<?php echo $data['account_no']?>" required>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">IFSC Code</label> <i class="text-danger asterik">*</i><?php echo isset($error['ifsc_code']) ? $error['ifsc_code'] : ''; ?>
                                    <input type="text" class="form-control" name="ifsc_code" value="<?php echo $data['ifsc_code']?>" required>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Bank Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['bank_name']) ? $error['bank_name'] : ''; ?>
                                    <input type="text" class="form-control" name="bank_name" value="<?php echo $data['bank_name']?>" required>
                                </div>
                            </div>
                       </div>
                    <hr>
                    <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Balance</label> <i class="text-danger asterik">*</i><?php echo isset($error['balance']) ? $error['balance'] : ''; ?>
                                    <input type="number" class="form-control" name="balance" value="<?php echo $data['balance']?>" required>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Earn</label> <i class="text-danger asterik">*</i><?php echo isset($error['earn']) ? $error['earn'] : ''; ?>
                                    <input type="number" class="form-control" name="earn" value="<?php echo $data['earn']?>" required>
                                </div>
                            </div>
                       </div>
                       <hr>
                       <div class="row">
                                <div class="form-group col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <div id="status" class="btn-group">
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="1" <?= ($data['status'] == 1) ? 'checked' : ''; ?>> Active
                                            </label>
                                            <label class="btn btn-danger" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="status" value="0" <?= ($data['status'] == 0) ? 'checked' : ''; ?>> Deactive
                                            </label>

                                        </div>
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
    $('#edit_profile_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            mobile: "required",
            

        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>