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

if (empty($_POST['type'])) {
    $response['success'] = false;
    $response['message'] = "type is Empty";
    print_r(json_encode($response));
    return false;
}
$type = $db->escapeString($_POST['type']);
if($type == 'target'){
    $sql = "SELECT * FROM earn_settings";
    $db->sql($sql);
    $res = $db->getResult();
    $spin_times_1 = $res[0]['spin_times_1'];
    $spin_times_2 = $res[0]['spin_times_2'];
    $spin_times_3 = $res[0]['spin_times_3'];
    $spin_times_4 = $res[0]['spin_times_4'];
    $spin_times_5 = $res[0]['spin_times_5'];
    $randnum = rand(1,5);
    get_spin_value();



}
elseif ($type == 'update_target'){
    if (empty($_POST['spin_position'])) {
        $response['success'] = false;
        $response['message'] = "Spin Position is Empty";
        print_r(json_encode($response));
        return false;
    }
    if (empty($_POST['user_id'])) {
        $response['success'] = false;
        $response['message'] = "User id is Empty";
        print_r(json_encode($response));
        return false;
    }
    if (empty($_POST['reward'])) {
        $response['success'] = false;
        $response['message'] = "Reward is Empty";
        print_r(json_encode($response));
        return false;
    }
    $user_id = $db->escapeString($_POST['user_id']);
    $spin_position = $db->escapeString($_POST['spin_position']);
    $reward = $db->escapeString($_POST['reward']);
    $sql = "SELECT * FROM spin_count WHERE `id`= '$spin_position'";
    $db->sql($sql);
    $res = $db->getResult();
    $spin_count = $res[0]['spin_count'];
    $spin_count = $spin_count + 1;  
    $sql = "UPDATE spin_count SET `spin_count`= '$spin_count' WHERE `id`= '$spin_position'";
    $db->sql($sql);
    $sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
    $db->sql($sql);
    $res = $db->getResult();
    $earn = $res[0]['earn'];
    $spin_count = $res[0]['spin_count'];
    $spin_count = $spin_count - 1;
    $earn = $earn + $reward;
    $sql = "UPDATE users SET `earn`= '$earn',`spin_count`= '$spin_count' WHERE `id`= '$user_id'";
    $db->sql($sql);
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "Updated Successfully";
    $response['data'] = $res;
    print_r(json_encode($response));

}
function get_spin_value(){

    global $spin_times_1, $spin_times_2, $spin_times_3, $spin_times_4, $spin_times_5, $randnum;
    $db = new Database();
    $db->connect();
    $sql = "SELECT * FROM earn_settings";
    $db->sql($sql);
    $earnres = $db->getResult();
    $sql = "SELECT * FROM spin_count WHERE `id`= '$randnum'";
    $db->sql($sql);
    $res = $db->getResult();
    $spin_count = $res[0]['spin_count'];
    if($randnum == 1){
        if($spin_times_1 <= $spin_count){
            $randnum = rand(2,3);
            get_spin_value();
        }
        else {
            $response['success'] = true;
            $response['spin'] = $randnum;
            $response['data'] = $earnres;
            print_r(json_encode($response));
        }
    }
    else if($randnum == 2){
        if($spin_times_2 <= $spin_count){
            $randnum = rand(3,5);
            get_spin_value();
        }
        else {
            $response['success'] = true;
            $response['spin'] = $randnum;
            $response['data'] = $earnres;
            print_r(json_encode($response));
        }
    }
    else if($randnum == 3){
        if($spin_times_3 <= $spin_count){
            $randnum = rand(4,5);
            get_spin_value();
        }
        else {
            $response['success'] = true;
            $response['spin'] = $randnum;
            $response['data'] = $earnres;
            print_r(json_encode($response));
        }
    }
    else if($randnum == 4){
        if($spin_times_4 <= $spin_count){
            $randnum = 5;
            get_spin_value();
        }
        else {
            $response['success'] = true;
            $response['spin'] = $randnum;
            $response['data'] = $earnres;
            print_r(json_encode($response));
        }
    }
    else if($randnum == 5){
        if($spin_times_5 <= $spin_count){
            $sql = "UPDATE spin_count SET `spin_count`= '0'";
            $db->sql($sql);
            $randnum = rand(1,5);
            get_spin_value();
        }
        else {
            $response['success'] = true;
            $response['spin'] = $randnum;
            $response['data'] = $earnres;
            print_r(json_encode($response));
        }
    }

}
function updateSpin(){
    global $randnum,$db,$spin_count;
    $spin_position = $randnum;
    $sql = "SELECT * FROM spin_count WHERE `id`= '$spin_position'";
    $db->sql($sql);
    $res = $db->getResult();
    $spin_count = $res[0]['spin_count'];
    $spin_count = $spin_count + 1;  
    $sql = "UPDATE spin_count SET `spin_count`= '$spin_count' WHERE `id`= '$randnum'";
    $db->sql($sql);
}


    
   


?>
