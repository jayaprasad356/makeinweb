<?php
session_start();
// include_once('../api-firebase/send-email.php');
include('../includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");
$auth_username = $db->escapeString($_SESSION["user"]);

include_once('../includes/custom-functions.php');
$fn = new custom_functions;
include_once('../includes/functions.php');
$function = new functions;
$permissions = $fn->get_permissions($_SESSION['id']);
$config = $fn->get_configurations();
$time_slot_config = $fn->time_slot_config();
if (isset($config['system_timezone']) && isset($config['system_timezone_gmt'])) {
    date_default_timezone_set($config['system_timezone']);
    $db->sql("SET `time_zone` = '" . $config['system_timezone_gmt'] . "'");
} else {
    date_default_timezone_set('Asia/Kolkata');
    $db->sql("SET `time_zone` = '+05:30'");
}

if (isset($_POST['payment_method_settings'])) {
    $data = $fn->get_settings('payment_methods', true);
    if (empty($data)) {
        $json_data = json_encode($fn->xss_clean_array($_POST));
        $sql = "INSERT INTO `settings`(`variable`, `value`) VALUES ('payment_methods','$json_data')";
        $db->sql($sql);
        echo "<div class='alert alert-success'> Settings created successfully!</div>";
    } else {
        $json_data = json_encode($fn->xss_clean_array($_POST));
        $sql = "UPDATE `settings` SET `value`='$json_data' WHERE `variable`='payment_methods'";
        $db->sql($sql);
        echo "<div class='alert alert-success'> Settings updated successfully!</div>";
    }
}

?>