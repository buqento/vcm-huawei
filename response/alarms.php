<?php

// // $connStr = "host=localhost port=5433 dbname=sdp user=postgres password=postgres";
// // $conn = pg_connect($connStr);
// $reset_table = 'TRUNCATE alarm';
// pg_query($conn, $reset_table);

// $url = 'http://localhost/api/cibinong/alarms/69edbbc01380fff6df6c3b82ea5493790093ede25a96dcf6f5ead873dc67335e';
$url = 'https://192.168.4.2/sdk_service/rest/users/login/v1.1';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_CAINFO, '/path/to/sertifikat')
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$datas = json_decode($result, true);

print_r($datas);
print_r('expression');

// $task_id = $datas[0]['alarm-list']['task-info']['task-id'];
// $camera_id = $datas[0]['alarm-list']['task-info']['camera-id'];
// $alarm_time = $datas[0]['alarm-list']['alarm']['alarm-time'];
// $face_id = $datas[0]['alarm-list']['alarm']['fr-info']['face-id'];
// $picture_id = $datas[0]['alarm-list']['alarm']['pictureId'];


// foreach ($datas as $key => $value) {
// 	$sync = "INSERT INTO alarm (kegiatan_id, waktu, kamera_id, wbp_id, nama_wbp, snapshot, status) VALUES ('".$datas[$key]['taskId']."', '".$datas[$key]['alarmTime']."', '".$datas[$key]['cameraId']."', '".$datas[$key]['faceId']."', 'nama wbp', '".$datas[$key]['pictureId']."', 0)";
// 	pg_query($conn, $sync);
// }

curl_close($ch)
?>