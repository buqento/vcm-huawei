<?php

session_start();
$sessi = $_SESSION["JSESSIONID"];

$curl = curl_init();
$url = '/sdk_service/rest/video-analysis/search-alarm/v1.2';
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://192.168.4.2".$url,
  CURLOPT_SSL_VERIFYHOST => false, 
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "
      <message>
       <displayNum>10</displayNum>
       <order>desc</order>
       <page>
       <no>1</no>
       <pageSize>10</pageSize>
       </page>
       <end-time>1541804023000</end-time>
       <rule>16</rule>
       <start-time>1540421623000</start-time>
      </message>
  ",
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

  //prepare database
  $connStr = "host=localhost port=5433 dbname=sdp user=postgres password=postgres";
  $conn = pg_connect($connStr);
  $reset_table = 'TRUNCATE alarm';
  pg_query($conn, $reset_table);

  $datas = new SimpleXMLElement($response);

  // foreach ($datas->{'alarm-list'}->alarms->alarm as $alarm) {
  //    echo $alarm->{'alarm-id'}, '<br>', $alarm->{'alarm-time'}, PHP_EOL;
  // }

  foreach ($datas->{'alarm-list'}->alarms as $alarms) {

     $id = $alarms->alarm->{'alarm-id'};
     $kegiatan_id = $alarms->{'task-info'}->{'task-id'};
     $waktu = $alarms->alarm->{'alarm-time'};
     $kamera_id = $alarms->{'task-info'}->{'camera-id'};
     $wbp_id = $alarms->alarm->{'fr-info'}->{'face-id'};
     $score = $alarms->alarm->{'fr-info'}->score;
     $snapshot = $alarms->alarm->pictureId;

    // insert to table
     $sync = "INSERT INTO alarm (id, kegiatan_id, waktu, kamera_id, wbp_id, nama_wbp, snapshot, status, alarm_id) VALUES ('".$id."', '".$kegiatan_id."', '".$waktu."', '".$kamera_id."', '".$snapshot."', 'nama wbp', '".$snapshot."', 0, '111')";
     pg_query($conn, $sync);

  }

  print_r($datas);
  print_r($datas->result->errmsg);
  // print_r($datas->totalCount);
}