<?php

$con = mysqli_connect("localhost", "root", "", "vcm");

$url = 'http://localhost/curl/cibinong/data.json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_CAINFO, '/path/to/sertifikat')
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$datas = json_decode($result, true);

foreach ($datas as $key => $value) {
	$kegiatan_id = $datas[$key]['alarm-list']['task-info']['task-id'];
	$waktu = $datas[$key]['alarm-list']['alarm']['alarm-time'];
	$kamera_id = $datas[$key]['alarm-list']['task-info']['camera-id'];
	$wbp_id = $datas[$key]['alarm-list']['alarm']['fr-info']['face-id'];
	$snapshot = $datas[$key]['alarm-list']['alarm']['pictureId'];
}

// foreach ($datas as $key => $value) {
// 	$sql = 'INSERT INTO alarm (kegiatan_id, waktu, kamera_id, wbp_id, snapshot) VALUES ("'.$datas[$key]['taskId'].'", "'.$datas[$key]['alarmTime'].'", "'.$datas[$key]['cameraId'].'", "'.$datas[$key]['faceId'].'", "'.$datas[$key]['pictureId'].'")';
// 	mysqli_query($con, $sql);
// }
curl_close($ch)
?>