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
$num = $db->numRows($res);
if ($num >= 1) {
    foreach ($res as $row) {
        $plan_id = $row['plan_id'];
        $start_date = $row['start_date'];
        $purchased_id = $row['id'];
        $credited_amount = $row['daily_income'];
        $valid = $row['valid'];
        $todaydate = new DateTime(date('Y-m-d'));
        $todaydate = $todaydate->format('Y-m-d'); 
        $credited_date = $todaydate;
        $now = time();
        $start_date_time = strtotime($start_date);
        $datediff = $now - $start_date_time;
        $days = round($datediff / (60 * 60 * 24));
        for ($i = 1; $i < $days; $i++) {
            if($i <= $valid ){
                $credited_date = date('Y-m-d', strtotime($start_date. ' + '. $i .' days'));
                $sql = "SELECT * FROM daily_income WHERE purchased_id = '$purchased_id' AND credited_date = '$credited_date'";
                $db->sql($sql);
                $res = $db->getResult();
                $num = $db->numRows($res);
                if($num == 0 ){
                    $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
                    $db->sql($sql);
                    $res = $db->getResult();
                    $earn = $res[0]['earn'];
                    $earn = $earn + $credited_amount;
                    $sql = "UPDATE users SET `earn`= '$earn' WHERE `id`= '$user_id'";
                    $db->sql($sql);
                    $sql = "INSERT INTO daily_income (`user_id`,`plan_id`,`purchased_id`,`credited_amount`,`credited_date`) VALUES ('$user_id','$plan_id','$purchased_id','$credited_amount','$credited_date')";
                    $db->sql($sql);
        
                }

            }

            
        }

        

    }
    $response['success'] = true;
    $response['message'] = "Daily Income Updated";

    // $daily_income = $res[0]['daily_income'];
    // $purchased_date = $res[0]['start_date'];
    // $todaydate = new DateTime(date('Y-m-d'));
    // $todaydate = '2022-04-30';
    // $valid = '1';
    // $testdate = date('Y-m-d', strtotime($todaydate. ' + '. $valid .' days'));

    // $now = time(); // or your date as well
    // $your_date = strtotime($purchased_date);
    // $datediff = $now - $your_date;
    // $days = round($datediff / (60 * 60 * 24));



    // $response['days'] = $days;
    // $response['daily_income_total'] = $days * $daily_income;
    // $response['test_date'] = $testdate;



}
else{
    $response['success'] = false;
    $response['message'] = "No Purchased Plans";

}

print_r(json_encode($response));
   
    
   


?>
