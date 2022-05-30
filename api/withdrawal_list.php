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
$sql = "SELECT * FROM withdrawals WHERE user_id = '$user_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {

    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['user_id'] = $row['user_id'];
        $temp['amount'] = $row['amount'];
        if($row['status'] == 0){
            $status = "Pending";
        }
        else if($row['status'] == 1){
            $status = "Completed";

        }
        else {
            $status = "Cancelled";

        }
        $temp['status'] = $status;
        $temp['last_updated'] = $row['last_updated'];
        $temp['date_created'] = $row['date_created'];
        $rows[] = $temp;
        
    }
    $response['success'] = true;
    $response['message'] = "Withdrawal Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));

}else{
    $response['success'] = false;
    $response['message'] = "No Withdrawals Found";
    print_r(json_encode($response));

}

?>