<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
include_once('includes/crud.php');
include_once('includes/variables.php');
$db = new Database();
$db->connect();
// session_start();
$withdrawals_id = $_GET['id'];
$sql = "SELECT *,withdrawals.id AS id FROM withdrawals,users WHERE withdrawals.user_id = users.id AND withdrawals.id = '$withdrawals_id'";
$db->sql($sql);
$res = $db->getResult();
if($res[0]['status'] == '0'){
    $status = 'Pending';
}
else if($res[0]['status'] == '1'){
    $status = 'Completed';
}
$upi = $res[0]['upi'];
$amount = $res[0]['amount'];
?>
<section class="content-header">
    <h1>View Withdrawal</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
<div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Withdrawal Detail</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px">ID</th>
                                <td><?php echo $res[0]['id'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">User Name</th>
                                <td><?php echo $res[0]['name'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">User Mobile</th>
                                <td><?php echo $res[0]['mobile'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Holder Name</th>
                                <td><?php echo $res[0]['holder_name'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Account Number</th>
                                <td><?php echo $res[0]['account_no'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">IFSC Code</th>
                                <td><?php echo $res[0]['ifsc_code'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Bank Name</th>
                                <td><?php echo $res[0]['bank_name']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Status</th>
                                <td><?php echo $status; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Date</th>
                                <td><?php echo $res[0]['date_created']; ?></td>
                            </tr>

                        </table>
                    </div><!-- /.box-body -->
                    <?php
                    if($res[0]['status'] != '1'){?>
                        <div class="box-footer clearfix">
                        <input type="submit" class="btn btn-primary" value="Pay Now" name="submit" onclick="payAmount(<?= $amount ?>,'<?= $upi ?>','<?= $res[0]['id'] ?>')">
                            
                        
                    </div>
                    <?php

                    }
                     ?>

                </div><!-- /.box -->
            </div></section>
        </div>

<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>

    function payAmount(amount,upi,id){
        $.ajax({
                url: 'api/enalo.php',
                type: 'post',
                data: {
                    amt: amount , upi : upi , id: id ,
                }, 
                success: function (data) {
                    var data = JSON.parse(data);
                    if(data.status == 'success'){
                        alert("Amount Paid Successfully");
                        location.reload(true);

                    }
                //    window.location.href = 'http://localhost/razorpay/success.php';
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Failed ");
                }
            });
       

            
    }



</script>
<script>
    $('#add_offer_form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    beforeSend: function() {
                        $('#submit_btn').html('Please wait..');
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        $('#result').html(result);
                        $('#result').show().delay(6000).fadeOut();
                        $('#submit_btn').html('Add');
                    
                        $('#add_offer_form')[0].reset();
                        
                    }
                });
    
    });
</script>
<script>
    document.getElementById('valid').valueAsDate = new Date();

</script>
