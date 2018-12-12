<?php

session_start();
$sessi = $_SESSION["JSESSIONID"];

$curl = curl_init();
$url = '/sdk_service/rest/image-library/get-download-task/v1.1?size=1&no=4';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  // CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => array(
    "content-type: text/plain;charset=UTF-8"
  ),
  CURLOPT_COOKIE => "JSESSIONID=".$sessi,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}