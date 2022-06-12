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
if (isset($_POST['btnUpdate'])) {
    $payment_status = $db->escapeString($_POST['payment_status']);
    // if ($payment_status == 'Success') {
    //     $sql = "UPDATE `withdrawals` SET `txn_id`='',`payment_status`= 'Success' WHERE id=" . $withdrawals_id;
    //     $db->sql($sql);
    //     $sql = "SELECT * FROM withdrawals WHERE id = '" . $withdrawals_id . "'";
    //     $db->sql($sql);
    //     $resw = $db->getResult();
    //     $amount = $resw[0]['amount'];
    //     $user_id = $resw[0]['user_id'];
    //     $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
    //     $db->sql($sql);
    //     $resw = $db->getResult();
    //     $earn = $resw[0]['earn'];
    //     $newearn = $earn - $amount;
    //     $sql = "UPDATE users SET `earn`= $newearn WHERE `id`=" . $user_id;
    //     $db->sql($sql);
        
    // } 
    $sql = "UPDATE withdrawals SET payment_status='$payment_status'WHERE id=$withdrawals_id";
    $db->sql($sql);
    $error['add_menu'] = " <span class='label label-success'>Updated</span>";

}

$sql = "SELECT *,withdrawals.id AS id,withdrawals.status AS status FROM withdrawals,users WHERE withdrawals.user_id = users.id AND withdrawals.id = '$withdrawals_id'";
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
                                <th style="width: 200px">UPI</th>
                                <td><?php echo $res[0]['upi'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Amount</th>
                                <td><?php echo $res[0]['amount']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Payment Status</th>
                                <td><?php echo $res[0]['payment_status']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Date</th>
                                <td><?php echo $res[0]['date_created']; ?></td>
                            </tr>

                        </table>
                        <?php if($res[0]['payment_status'] != 'Success'){ ?>
                        <form method="post" enctype="multipart/form-data">
                        <div class='col-md-8'>
                                    <select id="payment_status" name="payment_status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Success"<?=$res[0]['payment_status'] == 'Success' ? ' selected="selected"' : '';?>>Success</option>
                                        <option value="Fail"<?=$res[0]['payment_status'] == 'Fail' ? ' selected="selected"' : '';?> >Fail</option>
                                        <option value="Refund" <?=$res[0]['payment_status'] == 'Refund' ? ' selected="selected"' : '';?>>Refund</option>
                                        <option value="Process" <?=$res[0]['payment_status'] == 'Process' ? ' selected="selected"' : '';?>>Process</option>
                
                                    </select>
                                </div>
                                <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" value="Update" name="btnUpdate">
                          
                                </div>
                        </form>
                        <?php } ?>
                    </div><!-- /.box-body -->
                    </div>

                </div><!-- /.box -->
            </div></section>
        </div>

<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>

    function payAmount(amount,upi,id){
        $.ajax({
                url: 'api/paywithdrawal.php',
                type: 'post',
                data: {
                    amt: amount , upi : upi , id: id ,
                }, 
                success: function (data) {
                    var data = JSON.parse(data);
                    
                    if(data.status == 'SUCCESS'){
                        alert("Amount Paid Successfully");
                        location.reload(true);

                    }
                    else{
                        alert(data.message);

                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Payment Done ");
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
