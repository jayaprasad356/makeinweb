<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');

$db = new Database();
$db->connect();
if (empty($_POST['user_id'])) {
    $response['success'] = false;
    $response['message'] = "user_id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['plan_id'])) {
    $response['success'] = false;
    $response['message'] = "Plan Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['price'])) {
    $response['success'] = false;
    $response['message'] = "Price is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['valid'])) {
    $response['success'] = false;
    $response['message'] = "Valid is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['daily_income'])) {
    $response['success'] = false;
    $response['message'] = "Daily Income is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$plan_id = $db->escapeString($_POST['plan_id']);
$price = $db->escapeString($_POST['price']);
$valid = $db->escapeString($_POST['valid']);
$daily_income = $db->escapeString($_POST['daily_income']);
$startdate = new DateTime(date('Y-m-d'));
$startdate = $startdate->format('Y-m-d'); 
$enddate = date('Y-m-d', strtotime($startdate. ' + '. $valid .' days'));

$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num == 1){
    $balance = $res[0]['balance'];

if($balance >= $price){
    $balance = $balance - $price;
    $sql = "UPDATE users SET `balance`= $balance WHERE `id`=" . $user_id;
    $db->sql($sql);
    $sql = "INSERT INTO purchased_plans (`user_id`,`plan_id`,`daily_income`,`price`,`valid`,`start_date`,`end_date`) VALUES ('$user_id','$plan_id','$daily_income','$price','$valid','$startdate','$enddate')";
    $db->sql($sql);
    $res = $db->getResult();
    if (empty($res)) {
        $response['success'] = true;
        $response['message'] = "Plan Purchased Successfully";
        print_r(json_encode($response));

    }else{
        $response['success'] = false;
        $response['message'] = "Failed";
        print_r(json_encode($response));

    }

}else{
    $response['success'] = false;
    $response['message'] = "InSufficient Balance";
    print_r(json_encode($response));

}


}



?>