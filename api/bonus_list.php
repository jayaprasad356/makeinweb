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
    $response['message'] = "User Id is Empty";
    print_r(json_encode($response));
    return false;
}

$user_id = $db->escapeString($_POST['user_id']);
$sql = "SELECT * FROM `referral_bonus`,`users` WHERE referral_bonus.referral_user_id=$user_id AND users.id = referral_bonus.user_id";
$db->sql($sql);
$res = $db->getResult();

$response['success'] = true;
$response['message'] = "Bonus Retrived Successfully";
$response['data'] = $res;
print_r(json_encode($response));
?>