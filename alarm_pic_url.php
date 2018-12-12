<?php
session_start();
$sessi = $_SESSION["JSESSIONID"];

$curl = curl_init();
$url = '/sdk_service/rest/video-analysis/alarm_pic_url?alarm_id=000007015441243316236544@8';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => array(
    "content-type: text/plain"
  ),
  CURLOPT_COOKIE => "JSESSIONID=".$sessi,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

	$datas = new SimpleXMLElement($response);
  print_r($datas);
	// print_r($datas->result->errmsg);
}


?>