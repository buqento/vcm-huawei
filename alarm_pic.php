<?php
session_start();
$sessi = $_SESSION["JSESSIONID"];

$curl = curl_init();
$url = '/sdk_service/rest/video-analysis/alarm_pic/
v1.1?alarm_id=815fa3b2a0d84a2c986d83ff1873bee6#000007015441243316236544@8';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  // CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => array(
    "content-type: text/plain"
  ),
  CURLOPT_COOKIE => "JSESSIONID=".$sessi,
));

$response = curl_exec($curl);
// $datas = json_decode($response, true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r($response);
}

?>