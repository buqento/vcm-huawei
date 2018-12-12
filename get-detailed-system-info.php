<?php

include("config.php");

$curl = curl_init();
$url = '/sdk_service/rest/management/get-detailed-system-info';

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_COOKIE => "JSESSIONID=".JSESSIONID,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}