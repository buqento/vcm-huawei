
<?php

session_start();
$sessi = $_SESSION["JSESSIONID"];


$curl = curl_init();
$url = '/sdk_service/rest/video-analysis/get_intelligent_analysis_list';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "
	<request>
	<page no='1' pageSize='10' pageSort='desc' sortName='createDate'/>
	</request>
  ",
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

  //prepare database
  $connStr = "host=localhost port=5433 dbname=sdp user=postgres password=postgres";
  $conn = pg_connect($connStr);
  $reset_table = 'TRUNCATE intelligent';
  pg_query($conn, $reset_table);

  $datas = new SimpleXMLElement($response);

  foreach ($datas->{'task_list'}->task as $tsk) {

     $taskId = $tsk->taskId;
     $start_time = $tsk->{'action_analysis'}->start_time;
     $end_time = $tsk->{'action_analysis'}->end_time;
     $cameraSn = $tsk->cameraSn;
     $taskName = $tsk->taskName;
     $taskProgress = $tsk->taskProgress;
     $taskStatus = $tsk->taskStatus;

     $sync = "INSERT INTO intelligent (task_id, start_time, end_time, camera_sn, task_name, task_progress, task_status) VALUES ('".$taskId."', '".$start_time."', '".$end_time."', '".$cameraSn."', '".$taskName."', '".$taskProgress."', '".$taskStatus."')";
     pg_query($conn, $sync);

  }

  print_r($datas->result->errmsg);
}