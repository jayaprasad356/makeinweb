<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');
include_once('verify-token.php');
include_once('../includes/variables.php');
if (!verify_token()) {
    return false;
}

if (!isset($_POST['accesskey'])  || trim($_POST['accesskey']) != $access_key) {
    $response['success'] = false;
    $response['message'] = "No Accsess key found!";
    print_r(json_encode($response));
    return false;
    exit();
}

$db = new Database();
$db->connect();
$sql = "SELECT * FROM plans";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {

    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $temp['daily_income'] = $row['daily_income'];
        $temp['price'] = $row['price'];
        $temp['valid'] = $row['valid'];
        $temp['image'] = DOMAIN_URL  .$row['image'];
        $rows[] = $temp;
        
    }
    $response['success'] = true;
    $response['message'] = "Plans Listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));

}else{
    $response['success'] = false;
    $response['message'] = "No Plans Found";
    print_r(json_encode($response));

}

?>