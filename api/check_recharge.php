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

if (empty($_POST['amount'])) {
    $response['success'] = false;
    $response['message'] = "Amount is Empty";
    print_r(json_encode($response));
    return false;
}

$amount = $db->escapeString($_POST['amount']);

$sql = "SELECT * FROM earn_settings WHERE title = 'earn_settings'";
$db->sql($sql);
$res = $db->getResult();
$minirech = $res[0]['recharge_setting'];
if($amount <= $minirech){
    
    $response['success'] = true;
    $response['message'] = "Eligible Successfully";


}
else{
    $response['success'] = false;
    $response['message'] = "Mnimium Recharge amount Rs. ". $minirech;

}


print_r(json_encode($response));
   
    
   


?>
