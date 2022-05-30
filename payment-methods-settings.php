<?php

session_start();

// set time for session timeout
$currentTime = time() + 25200;
$expired = 3600;

// if session not set go to login page
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

// if current time is more than session timeout back to login page
if ($currentTime > $_SESSION['timeout']) {
    session_destroy();
    header("location:index.php");
}

// destroy previous session timeout and create new one
unset($_SESSION['timeout']);
$_SESSION['timeout'] = $currentTime + $expired;

include "header.php"; ?>
<html>

<head>
    <title>Payment Gateways & Payment Methods Settings | <?= $settings['app_name'] ?> - Dashboard</title>
</head>
</body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">

        <h2>Payment Gateways & Methods Settings</h2>
        <?php
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off" ? "https" : "http";
        $data = $fn->get_settings('payment_methods', true);
        ?>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        </ol>
        <hr />
    </section>
    <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Payment Methods Settings</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-4">
                                <form method="post" id="payment_method_settings_form">
                                    <input type="hidden" id="payment_method_settings" name="payment_method_settings" required="" value="1" aria-required="true">
                                    <h5>PayUMoney Payments </h5>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">Payment Mode <small>[ sandbox / live ]</small></label>
                                        <select name="payumoney_mode" class="form-control">
                                            <option value="">Select Mode </option>
                                            <option value="sandbox" <?= (isset($data['payumoney_mode']) && $data['payumoney_mode'] == 'sandbox') ? "selected" : "" ?>>Sandbox ( Testing )</option>
                                            <option value="production" <?= (isset($data['payumoney_mode']) && $data['payumoney_mode'] == 'production') ? "selected" : "" ?>>Production ( Live )</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="payumoney_merchant_key">Merchant key</label>
                                        <input type="text" class="form-control" name="payumoney_merchant_key" value="<?= (isset($data['payumoney_merchant_key'])) ? $data['payumoney_merchant_key'] : '' ?>" placeholder="PayUMoney Merchant Key" />
                                    </div>
                                    <div class="form-group">
                                        <label for="payumoney_merchant_id">Merchant ID</label>
                                        <input type="text" class="form-control" name="payumoney_merchant_id" value="<?= (isset($data['payumoney_merchant_id'])) ? $data['payumoney_merchant_id'] : '' ?>" placeholder="PayUMoney Merchant ID" />
                                    </div>
                                    <div class="form-group">
                                        <label for="payumoney_salt">Salt</label>
                                        <input type="text" class="form-control" name="payumoney_salt" value="<?= (isset($data['payumoney_salt'])) ? $data['payumoney_salt'] : '' ?>" placeholder="PayUMoney Merchant ID" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="btn_update" class="btn-primary btn" value="Save" name="btn_update" />
                                    </div>
                                    <div class="form-group">
                                        <div id="result"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    <div class="separator"> </div>
</div><!-- /.content-wrapper -->
</body>

</html>
<?php include "footer.php"; ?>
<!-- <script type="text/javascript" src="css/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('contact_us');
</script> -->
<script>
    $('#payment_method_settings_form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'public/db-operation.php',
            data: formData,
            beforeSend: function() {
                $('#btn_update').val('Please wait..').attr('disabled', true);
            },
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                $('#result').html(result);
                $('#result').show().delay(5000).fadeOut();
                $('#btn_update').val('Save').attr('disabled', false);
            }
        });
    });
</script>