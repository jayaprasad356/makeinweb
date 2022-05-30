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
$user_id = $db->escapeString($_POST['user_id']);
$sql = "SELECT * FROM purchased_plans WHERE user_id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$purchased_planscount = $db->numRows($res);
$todaydate = new DateTime(date('Y-m-d'));
$todaydate = $todaydate->format('Y-m-d'); 
$sql = "SELECT SUM(credited_amount) AS todayprofit FROM daily_income WHERE user_id = '$user_id' AND credited_date = '$todaydate'";
$db->sql($sql);
$res = $db->getResult();
$todayprofit = $res['0']['todayprofit'];
$sql = "SELECT SUM(credited_amount) AS totalprofit FROM daily_income WHERE user_id = '$user_id'";
$db->sql($sql);
$res = $db->getResult();
$totalprofit = $res['0']['totalprofit'];
$response['success'] = true;
$response['message'] = "User Details Count Found";
if($todayprofit == null){
    $todayprofit = 0;

}
if($totalprofit == null){
    $totalprofit = 0;

}
$response['purchased_plans'] = $purchased_planscount;
$response['todayprofit'] = $todayprofit;
$response['totalprofit'] = $totalprofit;
print_r(json_encode($response));

?>
