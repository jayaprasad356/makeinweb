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
if (empty($_POST['amount'])) {
    $response['success'] = false;
    $response['message'] = "Amount is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$amount = $db->escapeString($_POST['amount']);
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$earn = $res[0]['earn'];
$newearn = $earn - $amount;
$num = $db->numRows($res);
if ($num == 1) {
    $sql = "SELECT * FROM earn_settings WHERE title = 'earn_settings'";
    $db->sql($sql);
    $res = $db->getResult();
    $miniwith = $res[0]['minimum_setting'];
    if($amount <= $miniwith){
        if($amount <= $earn){
            $sql = "INSERT INTO withdrawals (`user_id`,`amount`,`status`) VALUES ('$user_id','$amount',0)";
            $db->sql($sql);
            $res = $db->getResult();
            
            // $sql = "UPDATE users SET `earn`= $newearn WHERE `id`=" . $user_id;
            // $db->sql($sql);
            // $res = $db->getResult();
            $response['success'] = true;
            $response['message'] = "Amount Withdrawal Requested Successfully";
    
        }
        else{
            $response['success'] = false;
            $response['message'] = "Insufficient Fund";
    
        }

    }
    else{
        $response['success'] = false;
        $response['message'] = "Mnimium Withdrawal amount Rs. ". $miniwith;

    }




}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";

}

print_r(json_encode($response));
   
    
   


?>
