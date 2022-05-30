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
if (empty($_POST['holder_name'])) {
    $response['success'] = false;
    $response['message'] = "Holder Name is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['account_no'])) {
    $response['success'] = false;
    $response['message'] = "Account No is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['ifsc_code'])) {
    $response['success'] = false;
    $response['message'] = "IFSC Code is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['bank_name'])) {
    $response['success'] = false;
    $response['message'] = "Bank Name is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$holder_name = $db->escapeString($_POST['holder_name']);
$account_no = $db->escapeString($_POST['account_no']);
$ifsc_code = $db->escapeString($_POST['ifsc_code']);
$bank_name = $db->escapeString($_POST['bank_name']);
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $sql = "UPDATE users SET `holder_name`= '$holder_name',`account_no`= '$account_no',`ifsc_code`= '$ifsc_code',`bank_name`= '$bank_name' WHERE `id`= '$user_id'";
    $db->sql($sql);
    $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "Profile Updated";
    $response['data'] = $res;
}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";
    $response['data'] = $res;

}
print_r(json_encode($response));
   
    
   


?>
