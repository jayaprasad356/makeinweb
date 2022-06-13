<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$sql_query = "SELECT id, name FROM category ORDER BY id ASC";
$db->sql($sql_query);

$res = $db->getResult();
$sql_query = "SELECT value FROM settings WHERE variable = 'Currency'";
$pincode_ids_exc = "";
$db->sql($sql_query);

$res_cur = $db->getResult();
if (isset($_POST['btnUpdate'])) {
        $error = array();
        $account_number = (isset($_POST['account_number'])) ? $db->escapeString($fn->xss_clean($_POST['account_number'])) : "";
        $ifsc_code = (isset($_POST['ifsc_code'])) ? $db->escapeString($fn->xss_clean($_POST['ifsc_code'])) : "";
        $bank_name = (isset($_POST['bank_name'])) ? $db->escapeString($fn->xss_clean($_POST['bank_name'])) : "";
        $name = (isset($_POST['name'])) ? $db->escapeString($fn->xss_clean($_POST['name'])) : "";
        $upi_id = (isset($_POST['upi_id'])) ? $db->escapeString($fn->xss_clean($_POST['upi_id'])) : "";
        $minimum_setting = (isset($_POST['minimum_setting'])) ? $db->escapeString($fn->xss_clean($_POST['minimum_setting'])) : "";
        $recharge_setting = (isset($_POST['recharge_setting'])) ? $db->escapeString($fn->xss_clean($_POST['recharge_setting'])) : "";
        $service_link = (isset($_POST['service_link'])) ? $db->escapeString($fn->xss_clean($_POST['service_link'])) : "";
        $razorpay_payment_method = (isset($_POST['razorpay_payment_method'])) ? $db->escapeString($fn->xss_clean($_POST['razorpay_payment_method'])) : "";
        $razorpay_key = (isset($_POST['razorpay_key'])) ? $db->escapeString($fn->xss_clean($_POST['razorpay_key'])) : "";
        $razorpay_secret_key = (isset($_POST['razorpay_secret_key'])) ? $db->escapeString($fn->xss_clean($_POST['razorpay_secret_key'])) : "";
        $spin_text_1 = (isset($_POST['spin_text_1'])) ? $db->escapeString($fn->xss_clean($_POST['spin_text_1'])) : "";
        $spin_text_2 = (isset($_POST['spin_text_2'])) ? $db->escapeString($fn->xss_clean($_POST['spin_text_2'])) : "";
        $spin_text_3 = (isset($_POST['spin_text_3'])) ? $db->escapeString($fn->xss_clean($_POST['spin_text_3'])) : "";
        $spin_text_4 = (isset($_POST['spin_text_4'])) ? $db->escapeString($fn->xss_clean($_POST['spin_text_4'])) : "";
        $spin_text_5 = (isset($_POST['spin_text_5'])) ? $db->escapeString($fn->xss_clean($_POST['spin_text_5'])) : "";
        $spin_times_1 = (isset($_POST['spin_times_1'])) ? $db->escapeString($fn->xss_clean($_POST['spin_times_1'])) : "";
        $spin_times_2 = (isset($_POST['spin_times_2'])) ? $db->escapeString($fn->xss_clean($_POST['spin_times_2'])) : "";
        $spin_times_3 = (isset($_POST['spin_times_3'])) ? $db->escapeString($fn->xss_clean($_POST['spin_times_3'])) : "";
        $spin_times_4 = (isset($_POST['spin_times_4'])) ? $db->escapeString($fn->xss_clean($_POST['spin_times_4'])) : "";
        $spin_times_5 = (isset($_POST['spin_times_5'])) ? $db->escapeString($fn->xss_clean($_POST['spin_times_5'])) : "";
        $share_link = (isset($_POST['share_link'])) ? $db->escapeString($fn->xss_clean($_POST['share_link'])) : "";
        $version = (isset($_POST['version'])) ? $db->escapeString($fn->xss_clean($_POST['version'])) : "";


        $totaltimes = $spin_times_1 + $spin_times_2 + $spin_times_3 + $spin_times_4 + $spin_times_5;
 
        if ($totaltimes == 100) {
            $sql = "UPDATE earn_settings SET account_number='$account_number',ifsc_code='$ifsc_code'
            ,bank_name='$bank_name',name='$name',upi_id='$upi_id',minimum_setting='$minimum_setting',
            recharge_setting='$recharge_setting',service_link='$service_link',spin_text_1='$spin_text_1',
            spin_text_2='$spin_text_2',spin_text_3='$spin_text_3',spin_text_4='$spin_text_4',
            spin_text_5='$spin_text_5',spin_times_1='$spin_times_1',spin_times_2='$spin_times_2'
            ,spin_times_3='$spin_times_3',spin_times_4='$spin_times_4',spin_times_5='$spin_times_5',
            share_link='$share_link',version='$version' WHERE title='earn_settings'";
            $db->sql($sql);
            $earnsettings_result = $db->getResult();
            if (!empty($earnsettings_result)) {
                $earnsettings_result = 0;
            } else {
                $earnsettings_result = 1;
            }
            if ($earnsettings_result == 1) {
                $error['add_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Updated Successfully</span>
                                                
                                                 </section>";
            } else {
                $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
            }

        }else{
            $error['add_menu'] = " <span class='label label-danger'>Total Spin Times Should be 100</span>";
        }
 

}

$sql = "SELECT * FROM earn_settings WHERE title= 'earn_settings'";
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row)
    $data = $row;
?>
<section class="content-header">
    <h1>Update Details</h1>
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
                    <h3 class="box-title">Update Details</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='updatedetails_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Account Number</label> <?php echo isset($error['account_number']) ? $error['account_number'] : ''; ?>
                                    <input type="text" class="form-control" name="account_number" value="<?php echo $data['account_number']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">IFSC Code</label> <?php echo isset($error['ifsc_code']) ? $error['ifsc_code'] : ''; ?>
                                    <input type="text" class="form-control" name="ifsc_code" value="<?php echo $data['ifsc_code']?>" >
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Account Holder Name</label> <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                    <input type="text" class="form-control" name="name" value="<?php echo $data['name']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Bank Name</label> <?php echo isset($error['bank_name']) ? $error['bank_name'] : ''; ?>
                                    <input type="text" class="form-control" name="bank_name" value="<?php echo $data['bank_name']?>">
                                </div>
                            </div>

                        </div>


                        <hr>
                        
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">UPI id</label> <?php echo isset($error['upi_id']) ? $error['upi_id'] : ''; ?>
                                    <input type="text" class="form-control" name="upi_id" value="<?php echo $data['upi_id']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Withdraw minimum setting</label> <?php echo isset($error['minimum_setting']) ? $error['minimum_setting'] : ''; ?>
                                    <input type="text" class="form-control" name="minimum_setting" value="<?php echo $data['minimum_setting']?>">
                                </div>
                               

                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                               <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Minimum Recharge Setting</label> <?php echo isset($error['recharge_setting']) ? $error['recharge_setting'] : ''; ?>
                                    <input type="text" class="form-control" name="recharge_setting" value="<?php echo $data['recharge_setting']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Customer Service Link</label> <?php echo isset($error['service_link']) ? $error['service_link'] : ''; ?>
                                    <input type="text" class="form-control" name="service_link" value="<?php echo $data['service_link']?>" >
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                               <div class='col-md-12'>
                                    <label for="exampleInputEmail1">Share Link</label> <?php echo isset($error['share_link']) ? $error['share_link'] : ''; ?>
                                    <input type="text" class="form-control" name="share_link" value="<?php echo $data['share_link']?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                               <div class='col-md-12'>
                                    <label for="exampleInputEmail1">App Version</label> <?php echo isset($error['version']) ? $error['version'] : ''; ?>
                                    <input type="number" class="form-control" name="version" value="<?php echo $data['version']?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Spin Wheel </h5>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                               <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 1</label> <?php echo isset($error['spin_text_1']) ? $error['spin_text_1'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_text_1" value="<?php echo $data['spin_text_1']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 1 (Times Out of 100)</label> <?php echo isset($error['spin_times_1']) ? $error['spin_times_1'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_times_1" value="<?php echo $data['spin_times_1']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 2</label> <?php echo isset($error['spin_text_2']) ? $error['spin_text_2'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_text_2" value="<?php echo $data['spin_text_2']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 2 (Times Out of 100)</label> <?php echo isset($error['spin_times_2']) ? $error['spin_times_2'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_times_2" value="<?php echo $data['spin_times_2']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 3</label> <?php echo isset($error['spin_text_3']) ? $error['spin_text_3'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_text_3" value="<?php echo $data['spin_text_3']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 3 (Times Out of 100)</label> <?php echo isset($error['spin_times_3']) ? $error['spin_times_3'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_times_3" value="<?php echo $data['spin_times_3']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 4</label> <?php echo isset($error['spin_text_4']) ? $error['spin_text_4'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_text_4" value="<?php echo $data['spin_text_4']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 4 (Times Out of 100)</label> <?php echo isset($error['spin_times_4']) ? $error['spin_times_4'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_times_4" value="<?php echo $data['spin_times_4']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 5</label> <?php echo isset($error['spin_text_5']) ? $error['spin_text_5'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_text_5" value="<?php echo $data['spin_text_5']?>">
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Spin 5 (Times Out of 100)</label> <?php echo isset($error['spin_times_5']) ? $error['spin_times_5'] : ''; ?>
                                    <input type="text" class="form-control" name="spin_times_5" value="<?php echo $data['spin_times_5']?>">
                                </div>
                            </div>
                        </div>
                        <!-- <h5>Razorpay Payments </h5>
                        <hr>
                        <div class="form-group">
                            <label for="razorpay_payment_method">Razorpay Payments <small>[ Enable / Disable ] </small></label><br>
                            <input type="checkbox" id="razorpay_payment_method_btn" class="js-switch" <?= (isset($data['razorpay_payment_method']) && !empty($data['razorpay_payment_method']) && $data['razorpay_payment_method'] == '1') ? 'checked' : ""; ?>>
                            <input type="hidden" id="razorpay_payment_method" name="razorpay_payment_method" value="<?= (isset($data['razorpay_payment_method']) && !empty($data['razorpay_payment_method'])) ? $data['razorpay_payment_method'] : 0; ?>">
                        </div>
                        <div class="form-group">
                            <label for="razorpay_key">Razorpay key ID</label>
                            <input type="text" class="form-control" name="razorpay_key" value="<?= (isset($data['razorpay_key'])) ? $data['razorpay_key'] : '' ?>" placeholder="Razor Key ID" />
                        </div>
                        <div class="form-group">
                            <label for="razorpay_secret_key">Secret Key</label>
                            <input type="text" class="form-control" name="razorpay_secret_key" value="<?= (isset($data['razorpay_secret_key'])) ? $data['razorpay_secret_key'] : '' ?>" placeholder="Razorpay Secret Key " />
                        </div> -->

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
    
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
    var changeCheckbox = document.querySelector('#razorpay_payment_method_btn');
    var init = new Switchery(changeCheckbox);
    changeCheckbox.onchange = function() {
        if ($(this).is(':checked')) {
            $('#razorpay_payment_method').val(1);
        } else {
            $('#razorpay_payment_method').val(0);
        }
    };

</script>