<?php
session_start();
$sessi = $_SESSION["JSESSIONID"];

$curl = curl_init();
$url = '/sdk_service/rest/cameras/v1.1?page=1&limit=10';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
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

  $datas = new SimpleXMLElement($response);

  if($datas){
	  //prepare database
	  $connStr = "host=localhost port=5433 dbname=sdp user=postgres password=postgres";
	  $conn = pg_connect($connStr);
	  $reset_table = 'TRUNCATE camera';
	  pg_query($conn, $reset_table);

	  foreach ($datas->{'camera-list'}->camera as $cam) {
	     $id = $cam->id;
	     $name = $cam->name;
	     $sn = $cam->sn;
	     $camera_type = $cam->{'camera-type'};
	     $task_type = $cam->taskTypeList->taskType;
	     $sync = "INSERT INTO camera (id, name, sn, camera_type, task_type) VALUES ('".$id."', '".$name."', '".$sn."', '".$camera_type."', '".$task_type."')";
	     pg_query($conn, $sync);
	  }

	  print_r($datas->result->errmsg);

  }else{
  	print_r('Data tidak tersimpan.');
  }


}