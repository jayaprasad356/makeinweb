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
$sql = "SELECT *,pup.id AS id,pup.daily_income AS daily_income,pup.price AS price,pup.valid AS valid FROM purchased_plans pup,plans p WHERE pup.plan_id =  p.id AND pup.user_id = '$user_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {
    foreach ($res as $row) {
        $id = $row['id'];

        $temp['id'] = $id;
        $sql = "SELECT *,SUM(credited_amount) AS earned_amt,COUNT(id) AS served_time  FROM `daily_income` WHERE purchased_id = '$id'";
        $db->sql($sql);
        $res = $db->getResult();
        $num = $db->numRows($res);
        $temp['name'] = $row['name'];
        $temp['daily_income'] = $row['daily_income'];
        $temp['price'] = $row['price'];
        $temp['valid'] = $row['valid'];
        $temp['start_date'] = $row['start_date'];
        $temp['end_date'] = $row['end_date'];
        $temp['served_time'] =  $res[0]['served_time'];
        $temp['earned_amt'] = $res[0]['earned_amt'];
        $temp['image'] = DOMAIN_URL  .$row['image'];
        $rows[] = $temp;
        
    }
    $response['success'] = true;
    $response['message'] = "Purchased Plans Listed Successfully" .$id;
    $response['data'] = $rows;
    print_r(json_encode($response));

}else{
    $response['success'] = false;
    $response['message'] = "No Plans Found";
    print_r(json_encode($response));

}

?>