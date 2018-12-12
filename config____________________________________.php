<?php

// $url = "https://192.168.4.2/sdk_service/rest/users/login/v1.1";
// $ch = curl_init();
// $headers = [];
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// // this function is called by curl for each header received
// curl_setopt($ch, CURLOPT_HEADERFUNCTION,
//   function($curl, $header) use (&$headers)
//   {
//     $len = strlen($header);
//     $header = explode(':', $header, 2);
//     if (count($header) < 2) // ignore invalid headers
//       return $len;

//     $name = strtolower(trim($header[0]));
//     if (!array_key_exists($name, $headers))
//       $headers[$name] = [trim($header[1])];
//     else
//       $headers[$name][] = trim($header[1]);

//     return $len;
//   }
// );

// $data = curl_exec($ch);
// print_r($headers);
// $ex = explode("=", $headers["Set-Cookie"][1]);
// session_start();
// $_SESSION['JSESSIONID'] =  $ex[1];

?>