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
    $response['message'] = "User ID is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $temp['mobile'] = $row['mobile'];
        $temp['referral'] = $row['referral'];
        $temp['my_refer_code'] = $row['my_refer_code'];
        $balance = $row['balance'];
        if($balance == NULL){
            $balance = 0;

        }
        $temp['balance'] = $balance;

        $earn = $row['earn'];
        if($earn == NULL){
            $earn = 0;

        }
        $temp['earn'] = $earn;
        $temp['level1_referral_id'] = $row['level1_referral_id'];
        $temp['level2_referral_id'] = $row['level2_referral_id'];
        $temp['level3_referral_id'] = $row['level3_referral_id'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "User Details Retrieved Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));

}else{
    $response['success'] = false;
    $response['message'] = "No User Found";
    print_r(json_encode($response));

}

?>