<?php


$curl = curl_init();
$headers = [];
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2/sdk_service/rest/users/login/v1.1",
  // CURLOPT_RETURNTRANSFER => true,

  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "account=dco&pwd=huawei@12345",
  CURLOPT_HEADER => true,
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"
  ),
  CURLOPT_HEADERFUNCTION => 
    function($curl, $header) use (&$headers)
    {
      $len = strlen($header);
      $header = explode(':', $header, 2);
      if (count($header) < 2) // ignore invalid headers
        return $len;

      $name = strtolower(trim($header[0]));
      if (!array_key_exists($name, $headers))
        $headers[$name] = [trim($header[1])];
      else
        $headers[$name][] = trim($header[1]);

      return $len;
    }

));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
}

$ex = explode("=", $headers["set-cookie"][0]);
$ex2 = explode(";", $ex[1]);
session_start();
$_SESSION['JSESSIONID'] =  $ex2[0];