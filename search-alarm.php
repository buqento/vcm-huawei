<?php

session_start();
$sessi = $_SESSION["JSESSIONID"];

$curl = curl_init();
$url = '/sdk_service/rest/video-analysis/search-alarm';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "
  <message>
    <cameras>
        <camera-id></camera-id>
    </cameras>
    <rule></rule>
    <alarm-level></alarm-level>
    <start-time></start-time>
    <end-time></end-time>
    <page-no>1</page-no>
    <page-size>1</page-size>
    <task-id>330A6461DC8D469CB4D8D4F2F65C7692</task-id>
  </message>
  ",
  CURLOPT_HTTPHEADER => array(
    "content-type: text/plain"
  ),
  CURLOPT_COOKIE => "JSESSIONID=".$sessi,
));

$response = curl_exec($curl);
$datas = json_decode($response, true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {


  $datas = new SimpleXMLElement($response);
  print_r($datas);
}


?>