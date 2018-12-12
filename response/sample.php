<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.XXXXX.id/2/XXXXX/XXXXX/XXXXX/XXXXX",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"XXXXX\":\"XXXXX\",\n  \"XXXXX\":\"XXXXX\",\n  \"XXXXX\":\"XXXXX\",\n  \"XXXXX\":{\n    \"XXXXX\":\"XXXXX\"\n  }\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-XXXXX",
    "content-type: application/json",
    "x-XXXXX-application-id: XXXXX",
    "x-XXXXX-master-key: XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}