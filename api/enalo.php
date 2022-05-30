<?php
session_start();
include_once('../includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");
include_once('../includes/functions.php');
$function = new functions; 
include_once('../includes/custom-functions.php');
$fn = new custom_functions;

$upi=$db->escapeString($_POST['upi']);
$amt=$db->escapeString($_POST['amt']);

$id = $db->escapeString($_POST['id']);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://stagingapi.enalo.in/dev/v0/va/fund_transfer/',
    CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS =>'{
                      "upi_id": "'.$upi.'",
                          "amount": "'.$amt.'",
                              "txn_type": "UPI",
                                  "remarks":"this is remark"
                                  }',
                                    CURLOPT_HTTPHEADER => array(
                                        'appId: 22877d0852254927a298986342f38a51',
                                            'secretKey: d9e8f4626cd34bb29a283891f1482a52',
                                                'Content-Type: application/json'
                                                  ),
                                                  ));
$response = curl_exec($curl);

curl_close($curl);
$res = json_decode($response, true);
$txn_id = $res['data']['txn_id'];

$sql = "UPDATE `withdrawals` SET `txn_id`='$txn_id',`status`=1 WHERE id=" . $id;
$db->sql($sql);
$sql = "SELECT * FROM withdrawals WHERE id = '" . $id . "'";
$db->sql($sql);
$res = $db->getResult();
$user_id = $res[0]['user_id'];
$sql = "SELECT * FROM users WHERE id = '" . $user_id . "'";
$db->sql($sql);
$res = $db->getResult();
$earn = $res[0]['earn'];
$newearn = $earn - $amt;
$sql = "UPDATE users SET `earn`= $newearn WHERE `id`=" . $user_id;
$db->sql($sql);
echo $response;
?>