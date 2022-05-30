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

if (isset($_POST['level']) && $_POST['level'] == '1'){
    if (empty($_POST['user_id'])) {
        $response['success'] = false;
        $response['message'] = "User ID is Empty";
        print_r(json_encode($response));
        return false;
    }
    
    $user_id = $db->escapeString($_POST['user_id']);
    $sql = "SELECT * FROM `users` WHERE level1_referral_id='$user_id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if ($num >= 1) {
        $totalcontribution = 0;
        foreach ($res as $row) {
            
            $id = $row['id'];
            $temp['id'] = $row['id'];
            $temp['name'] = $row['name'];
            $temp['mobile'] = $row['mobile'];
            $sql = "SELECT SUM(bonus_amount) AS contribution FROM `referral_bonus` WHERE referral_user_id='$user_id' AND user_id='$id' AND level = 1";
            $db->sql($sql);
            $res = $db->getResult();
            $contribution = $res[0]['contribution'];
            if($res[0]['contribution'] == null){
                $contribution = 0;
    
            }
            $temp['contribution'] = $contribution;
            $totalcontribution+= $contribution;
            $rows[] = $temp;
            
        }
        
        $response['success'] = true;
        $response['message'] = "Level 1 User Details Retrived Successfully";
        $response['total_contribution'] = $totalcontribution;
        $response['team_size'] = $num;
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "No Data Found";
        $response['total_contribution'] = 0;
        $response['team_size'] = 0;
        print_r(json_encode($response));

    }



}
if (isset($_POST['level']) && $_POST['level'] == '2'){
    if (empty($_POST['user_id'])) {
        $response['success'] = false;
        $response['message'] = "User ID is Empty";
        print_r(json_encode($response));
        return false;
    }
    
    $user_id = $db->escapeString($_POST['user_id']);
    $sql = "SELECT * FROM `users` WHERE level2_referral_id='$user_id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if ($num >= 1) {
        $totalcontribution = 0;
        foreach ($res as $row) {
            $id = $row['id'];
            $temp['id'] = $row['id'];
            $temp['name'] = $row['name'];
            $temp['mobile'] = $row['mobile'];
            $sql = "SELECT SUM(bonus_amount) AS contribution FROM `referral_bonus` WHERE referral_user_id='$user_id' AND user_id='$id' AND level = 2";
            $db->sql($sql);
            $res = $db->getResult();
            $contribution = $res[0]['contribution'];
            if($res[0]['contribution'] == null){
                $contribution = 0;
    
            }
            $temp['contribution'] = $contribution;
            $totalcontribution+= $contribution;
            $rows[] = $temp;
            
        }
        
        $response['success'] = true;
        $response['message'] = "Level 2 User Details Retrived Successfully";
        $response['total_contribution'] = $totalcontribution;
        $response['team_size'] = $num;
        $response['data'] = $rows;
        print_r(json_encode($response));

    }
    else{
        $response['success'] = false;
        $response['message'] = "No Data Found";
        $response['total_contribution'] = 0;
        $response['team_size'] = 0;
        print_r(json_encode($response));
    }


}
if (isset($_POST['level']) && $_POST['level'] == '3'){
    if (empty($_POST['user_id'])) {
        $response['success'] = false;
        $response['message'] = "User ID is Empty";
        print_r(json_encode($response));
        return false;
    }
    
    $user_id = $db->escapeString($_POST['user_id']);
    $sql = "SELECT * FROM `users` WHERE level3_referral_id='$user_id'";
    $db->sql($sql);
    $res = $db->getResult();
    $num = $db->numRows($res);
    if ($num >= 1) {
        $totalcontribution = 0;

        foreach ($res as $row) {
            $id = $row['id'];
            $temp['id'] = $row['id'];
            $temp['name'] = $row['name'];
            $temp['mobile'] = $row['mobile'];
            $sql = "SELECT SUM(bonus_amount) AS contribution FROM `referral_bonus` WHERE referral_user_id='$user_id' AND user_id='$id' AND level = 3";
            $db->sql($sql);
            $res = $db->getResult();
            $contribution = $res[0]['contribution'];
            if($res[0]['contribution'] == null){
                $contribution = 0;
    
            }
            $temp['contribution'] = $contribution;
            $totalcontribution+= $contribution;
            $rows[] = $temp;
            
        }
        
        $response['success'] = true;
        $response['message'] = "Level 3 User Details Retrived Successfully";
        $response['total_contribution'] = $totalcontribution;
        $response['team_size'] = $num;
        $response['data'] = $rows;
        print_r(json_encode($response));


    }
    else{
        $response['success'] = false;
        $response['message'] = "No Data Found";
        $response['total_contribution'] = 0;
        $response['team_size'] = 0;
        print_r(json_encode($response));

    }


}

?>