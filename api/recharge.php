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
if (empty($_POST['type'])) {
    $response['success'] = false;
    $response['message'] = "Type is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$amount = $db->escapeString($_POST['amount']);
$type = $db->escapeString($_POST['type']);

$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();

$num = $db->numRows($res);
if ($num == 1) {
    $level1_referral_id = $res[0]['level1_referral_id'];
    $level2_referral_id = $res[0]['level2_referral_id'];
    $level3_referral_id = $res[0]['level3_referral_id'];
    $recharge = $res[0]['balance'];
    $recharge = $recharge + $amount;
    $sql = "SELECT * FROM earn_settings WHERE title = 'earn_settings'";
    $db->sql($sql);
    $res = $db->getResult();
    $minirech = $res[0]['recharge_setting'];
    if($amount <= $minirech){
        $sql = "INSERT INTO recharges (`user_id`,`amount`,`payment_type`,`status`) VALUES ('$user_id','$amount','$type','1')";
        $db->sql($sql);
        $res = $db->getResult();
        
        $sql = "UPDATE users SET `balance`= $recharge WHERE `id`=" . $user_id;
        $db->sql($sql);
        $res = $db->getResult();
    
        if($level1_referral_id != 0){
            $level = 1;
            $sql = "SELECT * FROM refer_commission";
            $db->sql($sql);
            $res = $db->getResult();
            $level_percentage = $res[0]['level_1'];
        
            $bonus_amount = ($level_percentage / 100) * $amount ;
        
            $sql = "INSERT INTO referral_bonus (`user_id`,`referral_user_id`,`level`,`recharged_amount`,`level_percentage`,`bonus_amount`) VALUES ('$user_id',$level1_referral_id,$level,$amount,$level_percentage,$bonus_amount)";
            $db->sql($sql);
            $res = $db->getResult();
            $sql = "SELECT * FROM users WHERE id = '" . $level1_referral_id . "'";
            $db->sql($sql);
            $res = $db->getResult();
            $earn = $res[0]['earn'];
            $earn = $earn + $bonus_amount;
            $sql = "UPDATE users SET `earn`= '$earn' WHERE `id`= '$level1_referral_id'";
            $db->sql($sql);
        }
        if($level2_referral_id != 0){
            $level = 2;
            $sql = "SELECT * FROM refer_commission";
            $db->sql($sql);
            $res = $db->getResult();
            $level_percentage = $res[0]['level_2'];
        
            $bonus_amount = ($level_percentage / 100) * $amount ;
        
            $sql = "INSERT INTO referral_bonus (`user_id`,`referral_user_id`,`level`,`recharged_amount`,`level_percentage`,`bonus_amount`) VALUES ('$user_id',$level2_referral_id,$level,$amount,$level_percentage,$bonus_amount)";
            $db->sql($sql);
            $res = $db->getResult();
        }
        if($level3_referral_id != 0){
            $level = 3;
            $sql = "SELECT * FROM refer_commission";
            $db->sql($sql);
            $res = $db->getResult();
            $level_percentage = $res[0]['level_3'];
        
            $bonus_amount = ($level_percentage / 100) * $amount ;
        
            $sql = "INSERT INTO referral_bonus (`user_id`,`referral_user_id`,`level`,`recharged_amount`,`level_percentage`,`bonus_amount`) VALUES ('$user_id',$level3_referral_id,$level,$amount,$level_percentage,$bonus_amount)";
            $db->sql($sql);
            $res = $db->getResult();
        }
    
    
    
    
        $response['success'] = true;
        $response['message'] = "Amount Recharged Successfully";
    

    }
    else{
        $response['success'] = false;
        $response['message'] = "Mnimium Rexcharge amount Rs. ". $minirech;

    }


}
else{
    $response['success'] = false;
    $response['message'] = "User Not Found";

}

print_r(json_encode($response));
   
    
   


?>
