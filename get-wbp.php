<?php

$curl = curl_init();
$url = 'http://localhost/api/cibinong/wbps';
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo $err;
} else {

  //prepare database
  $connStr = "host=localhost port=5433 dbname=sdp user=postgres password=postgres";
  $conn = pg_connect($connStr);
  $reset_table = 'TRUNCATE wbp';
  pg_query($conn, $reset_table);

  $datas = json_decode($response);

  foreach ($datas as $key => $value) {
    $name = $datas[$key]->NAMA_LENGKAP;
    $wbpid = $datas[$key]->NOMOR_INDUK;
    $blok_id = $datas[$key]->BLOK_ID;
    $sel_id = $datas[$key]->SEL_ID;
    $sync = "INSERT INTO wbp (wbpid, name, foto, blok_id, sel_id) VALUES ('".$wbpid."', '".$name."', 'base64', '".$blok_id."', '".$sel_id."')";
    pg_query($conn, $sync);

  }

  echo "Ok";

}