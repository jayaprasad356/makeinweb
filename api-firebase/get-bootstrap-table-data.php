<?php
session_start();

// set time for session timeout
$currentTime = time() + 25200;
$expired = 3600;

// if session not set go to login page
if (!isset($_SESSION['username'])) {
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

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include_once('../includes/custom-functions.php');
$fn = new custom_functions;
include_once('../includes/crud.php');
include_once('../includes/variables.php');
$db = new Database();
$db->connect();
$config = $fn->get_configurations();
if (isset($config['system_timezone']) && isset($config['system_timezone_gmt'])) {
    date_default_timezone_set($config['system_timezone']);
    $db->sql("SET `time_zone` = '" . $config['system_timezone_gmt'] . "'");
} else {
    date_default_timezone_set('Asia/Kolkata');
    $db->sql("SET `time_zone` = '+05:30'");
}
if (isset($_GET['table']) && $_GET['table'] == 'users') {

    $sql = "SELECT * FROM users ";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {
        $operate = '<a href="purchasedplans.php?id=' . $row['id'] . '" title="View">View purchased plans</a>'; 
        $history= '<a href="rechargedhistories.php?id=' . $row['id'] . '" title="View">View recharge history</a>';
        $daily_income= '<a href="dailyincomes.php?id=' . $row['id'] . '" title="View">View daily incomes</a>';
        $profile= ' <a href="edit-profile.php?id=' . $row['id'] . '" title="Edit"><i class="fa fa-edit"></i></a>';

        $tempRow['id'] = $row['id'];
        $tempRow['name'] = $row['name'];
        $tempRow['mobile'] = $row['mobile'];
        $tempRow['referral'] = $row['referral'];
        $tempRow['my_refer_code'] = $row['my_refer_code'];
        $tempRow['balance'] = $row['balance'];
        $tempRow['operate'] = $operate;
        $tempRow['history'] = $history;
        $tempRow['daily_income'] = $daily_income;
        $tempRow['profile'] = $profile;
        $rows[] = $tempRow;
        }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'plans') {
    $where = '';
    
    $sql = "SELECT * FROM plans";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {

        $operate = ' <a href="edit-plan.php?id=' . $row['id'] . '" title="Edit"><i class="fa fa-edit"></i></a>';
        $tempRow['id'] = $row['id'];
        $tempRow['daily_income'] = $row['daily_income'];
        $tempRow['price'] = $row['price'];
        $tempRow['valid'] = $row['valid'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;
    }
$bulkData['rows'] = $rows;
print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'withdrawals') {
    $where = '';
    
    $sql = "SELECT *,withdrawals.id AS id FROM withdrawals,users WHERE withdrawals.user_id = users.id ORDER BY status";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {

        $operate = ' <a href="update_withdrawals.php?id=' . $row['id'] . '" title="Edit"><i class="fa fa-edit"></i></a>';
        $tempRow['id'] = $row['id'];
        $tempRow['user_id'] = $row['user_id'];
        $tempRow['name'] = $row['name'];
        $tempRow['mobile'] = $row['mobile'];
        $tempRow['amount'] = $row['amount'];
        $status = $row['status'];
        if($status == '0'){
            $status = 'Pending';
        }
        else{
            $status = 'Completed';

        }
        $tempRow['status'] = $status;
        $tempRow['date_created'] = $row['date_created'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;
    }
$bulkData['rows'] = $rows;
print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'purchasedplans') {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM purchased_plans WHERE user_id = $user_id";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {

        $operate = '<a href="view-product-variants.php?id=' . $row['id'] . '" title="View"><i class="fa fa-folder-open"></i></a>';
        $tempRow['id'] = $row['id'];
        $tempRow['user_id'] = $row['user_id'];
        $tempRow['daily_income'] = $row['daily_income'];
        $tempRow['price'] = $row['price'];
        $tempRow['valid'] = $row['valid'];
      
        $rows[] = $tempRow;
    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'rechargedhistories') {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM recharges WHERE user_id = $user_id";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {

        $operate = '<a href="view-product-variants.php?id=' . $row['id'] . '" title="View"><i class="fa fa-folder-open"></i></a>';
        $operate .= ' <a href="edit-status.php?id=' . $row['id'] . '" title="Edit"><i class="fa fa-edit"></i></a>';
        $tempRow['id'] = $row['id'];
        $tempRow['user_id'] = $row['user_id'];
        $tempRow['amount'] = $row['amount'];
        $tempRow['status'] = $row['status'];
        $tempRow['payment_type'] = $row['payment_type'];
        $tempRow['operate'] = $operate;
        $rows[] = $tempRow;
    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}
if (isset($_GET['table']) && $_GET['table'] == 'dailyincomes') {
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM daily_income WHERE user_id = $user_id";
    $db->sql($sql);
    $res = $db->getResult();
    $rows = array();
    $tempRow = array();
    foreach ($res as $row) {

        
        $tempRow['id'] = $row['id'];
        $tempRow['user_id'] = $row['user_id'];
        $tempRow['plan_id'] = $row['plan_id'];
        $tempRow['purchased_id'] = $row['purchased_id'];
        $tempRow['credited_amount'] = $row['credited_amount'];
       
        $rows[] = $tempRow;
    }
    $bulkData['rows'] = $rows;
    print_r(json_encode($bulkData));
}



$db->disconnect();
